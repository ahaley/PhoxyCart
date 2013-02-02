<?php

class TransactionDatafeedTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function CallDatafeedWithSingleTransaction()
    {
        $transaction_post = file_get_contents(
            FIXTURES_PATH . '/transaction_post'
        );
        $ch = curl_init(DATAFEED_URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $transaction_post);
        curl_exec($ch);
        curl_close($ch);
    }
}
