<?php

class CustomerAdapterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function ShouldRetrieveCustomerList()
    {
        $adapter = new PhoxyCart\CustomerAdapter();

        $customers = $adapter->getCustomerList();

        print "Retrieved " . count($customers) . " customers from api." . PHP_EOL;
        foreach ($customers as $customer) {
            print "id: " . $customer->customer_id
                . " and email = " . $customer->customer_email . PHP_EOL;
        }
    }

    /**
     * @test
     */
    public function ShouldRetrieveCustomerByEmail()
    {
        $adapter = new PhoxyCart\CustomerAdapter();

        $customer = $adapter->getCustomer('antonio.haley@gmail.com');

        $this->assertEquals('antonio.haley@gmail.com', $customer->customer_email);
    }

    /**
     * @test
     */
     /*
    public function ShouldCreateCustomer()
    {
        $adapter = new PhoxyCart\CustomerAdapter();

        $result = $adapter->createCustomer('antonio.haley@gmail.com');

        $this->assertTrue($result);
    }
    */
}
