<?php

namespace PhoxyCart;

class TransactionParser
{
    public function parse($xmlString)
    {
        $xml = simplexml_load_string($xmlString);

        $transactions = array();

        foreach ($xml->transactions->transaction as $txml) {
            $transaction = $this->extractTransaction($txml);
            $transaction->customer = $this->extractCustomer($txml);
            $transactions[] = $transaction;
        }

        return $transactions;
    }

    private function extractTransaction(&$txml)
    {
        static $map = array(
            'id' => 'id',
            'transaction_date' => 'transaction_date',
            'ip' => 'customer_ip'
        );
        $transaction = array();
        foreach ($map as $to => $from) {
            $transaction[$to] = (string)$txml->$from;
        }
        return (object)$transaction;
    }

    private function extractCustomer(&$txml)
    {
        static $map = array(
            'first_name' => 'customer_first_name',
            'last_name' => 'customer_last_name',
            'email' => 'customer_email',
            'phone' => 'customer_phone',
            'is_anonymous' => 'is_anonymous',
        );

        $customer = $this->createMappedObject($map, $txml);
        $customer->customer_address = $this->extractCustomerAddress($txml);
        return $customer;
    }

    private function extractCustomerAddress(&$txml)
    {
        static $map = array(
            'address1' => 'customer_address1',
            'address2' => 'customer_address2',
            'city' => 'customer_city',
            'state' => 'customer_state',
            'postal_code' => 'customer_postal_code',
            'country' => 'customer_country',
        );
        return $this->createMappedObject($map, $txml);
    }

    private function createMappedObject(array &$map, &$txml)
    {
        $mappedObject = array();
        foreach ($map as $to => $from) {
            $mappedObject[$to] = (string)$txml->$from;
        }
        return (object)$mappedObject;

    }
}
