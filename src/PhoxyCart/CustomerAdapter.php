<?php

namespace PhoxyCart;

class CustomerAdapter implements CustomerAdapterInterface
{
    private $api;
    private $message;
    
    public function __construct()
    {
        $this->api = new FoxycartApi();
    }

    public function getCustomerList()
    {
        $response = $this->api->call('customer_list');
        $this->storeMessage($response);

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
        print_r($response);
        $this->storeMessage($response);
        return $response;
    }

    public function createCustomer($email, $hash, $salt)
    {
        $response = $this->api->call('customer_save', array(
            'customer_email' => $email,
            'customer_password_hash' => $hash,
            'customer_password_salt' => $salt
        ));
        $this->storeMessage($response);
        return $response->result == 'SUCCESS';
    }

    public function errorMessage()
    {
        return $this->message;
    }

    private function storeMessage($response)
    {
        $this->message = (string)$response->messages->message;
    }
}
