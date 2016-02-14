<?php
/**
 * Created by Malik Abiola.
 * Date: 10/02/2016
 * Time: 16:20
 * IDE: PhpStorm
 * Create returning transaction
 */

namespace Paystack\Models;


use Paystack\Abstractions\BaseTransaction;
use Paystack\Contracts\TransactionContract;
use Paystack\Exceptions\PaystackInvalidTransactionException;
use Paystack\Helpers\Utils;
use Paystack\Repositories\TransactionResource;

class ReturningTransaction extends BaseTransaction implements TransactionContract
{
    use Utils;

    protected $transactionResource;

    private $transactionRef;
    private $authorization;
    private $amount;
    private $email;
    private $plan;

    /**
     * ReturningTransaction constructor.
     * @param $transactionRef
     * @param $authorization
     * @param $amount
     * @param $email
     * @param $plan
     * @param TransactionResource $transactionResource
     */
    protected function __construct
    (
        $transactionRef,
        $authorization,
        $amount,
        $email,
        $plan,
        TransactionResource $transactionResource
    )
    {
        $this->transactionRef = $transactionRef;
        $this->authorization = $authorization;
        $this->amount = $amount;
        $this->email = $email;
        $this->plan = $plan;

        $this->transactionResource = $transactionResource;
    }

    /**
     * Create a new returning transaction object
     * @param $authorization
     * @param $amount
     * @param $email
     * @param $plan
     * @return static
     */
    public static function make($authorization, $amount, $email, $plan)
    {
        return new static(
            self::generateTransactionRef(),
            $authorization,
            $amount,
            $email,
            $plan,
            self::getTransactionResource()
        );
    }

    /**
     * Charge returning transaction
     * @return \Exception|mixed|PaystackInvalidTransactionException
     */
    public function charge()
    {
        return !is_null($this->transactionRef) ?
            $this->transactionResource->chargeAuthorization($this->_requestPayload()) :
            new PaystackInvalidTransactionException(["message" => "Transaction Reference Not Generated."]);
    }

    /**
     * Get returning transaction request body
     * @return string
     */
    public function _requestPayload()
    {
        $payload = [
            'authorization_code'    => $this->authorization,
            'amount'                => $this->amount,
            'reference'             => $this->transactionRef,
            'email'                 => $this->email
        ];

        if (!empty($this->plan)) {
            $payload['plan'] = $this->plan;
        }

        return $this->toJson($payload);
    }
}
