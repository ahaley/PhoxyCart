<?php

namespace PhoxyCart;

class TransactionParser
{
    public function parse($xmlString)
    {
        $xml = simplexml_load_string($xmlString);

        $transactions = array();

        foreach ($xml->transactions->transaction as $transactionXml) {
            $transaction = array(
                'id' => (string)$transactionXml->id
            );
            $transactions[] = (object)$transaction;
        }

        return $transactions;
    }
}
