<?php

class TransactionParserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function ShouldParseTransaction()
    {
        $adapter = new PhoxyCart\TransactionParser();
        $transactions = $adapter->parse($this->getTransactionXml());

        $this->assertEquals(1, count($transactions));
        $transaction = $transactions[0];
        $this->assertEquals('52768', $transaction->id);
    }

    /**
     * @test
     */
    public function ShouldParseCustomer()
    {
        $adapter = new PhoxyCart\TransactionParser();
        $transactions = $adapter->parse($this->getTransactionXml());
        $transaction = $transactions[0];
        $customer = $transaction->customer;
        $this->assertEquals('Jörgé •™¡ªº', $customer->first_name);
    }

    /**
     * @test
     */
    public function ShouldParseAddress()
    {
        $adapter = new PhoxyCart\TransactionParser();
        $transactions = $adapter->parse($this->getTransactionXml());
        $transaction = $transactions[0];
        $customer = $transaction->customer;
        $address = $customer->customer_address;
        $this->assertEquals('&amp;', $address->address1);
        $this->assertEquals('', $address->address2);
    }

    private function getTransactionXml()
    {
        return file_get_contents(FIXTURES_PATH . '/transaction.xml');
    }
}
