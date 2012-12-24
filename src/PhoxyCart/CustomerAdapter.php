<?php

namespace PhoxyCart;

class CustomerAdapter
{
    private $api;

    public function __construct()
    {
        $this->api = new FoxycartApi();
    }

    public function getCustomerList()
    {
        $foxyResponse = $this->api->call('customer_list');

        $customers = array();
        foreach ($foxyResponse->customers as $customer) {
            $customers[] = $customer->customer;
        }

        return $customers;

    }

    public function getCustomer($email)
    {
        $foxyResponse = $this->api->call('customer_get',
            array('customer_email' => $email)
        );

        print_r($foxyResponse);
        die();
    }
}
