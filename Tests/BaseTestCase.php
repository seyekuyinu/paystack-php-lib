<?php
namespace Paystack\Tests;

/**
 * Description of BaseTestCase
 *
 * @author Doctormaliko
 */
class BaseTestCase extends \PHPUnit_Framework_TestCase {
    //put your code here
    protected $customerResource;
    protected $customer;

    protected $transactionRequestArray;

    protected $customerCreateResponseData = [
        "first_name"=> "first_name",
        "last_name"=> "last_name",
        "email"=> "email@email.com",
        "phone"=> "2348032145698",
        "integration"=> 100082,
        "domain"=> "test",
        "customer_code"=> "CUS_docpswclqcq6oha",
        "id"=> 4158,
        "createdAt"=> "2016-02-14T10=>15=>33.481Z",
        "updatedAt"=> "2016-02-14T10=>15=>33.481Z"
    ];

    protected $customerRetrievedResponseData = [
        "transactions"=> [],
        "subscriptions"=> [],
        "authorizations"=> [],
        "first_name"=> "first_name",
        "last_name"=> "last_name",
        "email"=> "email@email.com",
        "phone"=> "2348032145698",
        "metadata"=> null,
        "domain"=> "test",
        "customer_code"=> "CUS_k324c8osdjcohgt",
        "id"=> 4166,
        "integration"=> 100082,
        "createdAt"=> "2016-02-14T10=>56=>55.000Z",
        "updatedAt"=> "2016-02-14T10=>56=>55.000Z",
        "total_transactions"=> 0,
        "total_transaction_value"=> 0
    ];

    protected $customerUpdatedResponseData = [
        "first_name"=> "first_name",
        "last_name"=> "new_last_name",
        "email"=> "email@email.com",
        "phone"=> "2348032145698",
        "metadata"=> null,
        "domain"=> "test",
        "customer_code"=> "CUS_k324c8osdjcohgt",
        "id"=> 4166,
        "integration"=> 100082,
        "createdAt"=> "2016-02-14T10=>56=>55.000Z",
        "updatedAt"=> "2016-02-14T19=>22=>41.000Z"
    ];

    protected $customerData = [
        'first_name' => 'first_name',
        'last_name' => 'last_name',
        'email' => 'email@email.com',
        'phone' => '2348032145698'
    ];

    public function setUp()
    {
        parent::setUp();

    }

    public function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}
