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
    public function ShouldCreateCustomer()
    {
        $hash = 'rApGEJL5kmRvvhR3sVk7h7qronY15kab';
        $salt = 'dtjMDoG8nE1kf8ksJBuRmV7N8VOOSyS4';
        $adapter = new PhoxyCart\CustomerAdapter();

        $result = $adapter->createCustomer('antonio.haley2@gmail.com', $hash, $salt);

        $this->assertTrue($result);
    }
}
