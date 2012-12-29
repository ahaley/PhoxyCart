<?php

namespace PhoxyCart;

class CustomerAdapter implements CustomerAdapterInterface
{
    private $api;

    public function __construct()
    {
        $this->api = new FoxycartApi();
    }

    public function getCustomerList()
    {
        $response = $this->api->call('customer_list');

        $customers = array();
        foreach ($response->customers->customer as $customer) {
            $customers[] = $customer;
        }

        return $customers;

    }

    public function getCustomer($email)
    {
        $response = $this->api->call('customer_get',
            array('customer_email' => $email)
        );
        return $response;
    }

    public function createCustomer($email, $hash, $salt)
    {
        $response = $this->api->call('customer_save', array(
            'customer_email' => $email,
            'customer_password_hash' => $hash,
            'customer_password_salt' => $salt
        ));
        return $response->result == 'SUCCESS';
    }
}
