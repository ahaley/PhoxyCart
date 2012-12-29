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
    }

    private function getTransactionXml()
    {
        return file_get_contents(FIXTURES_PATH . '/transaction.xml');
    }
}
