<?php

namespace PhoxyCart;

class FoxycartApi
{
    private $token;

    private $domain;

    public function __construct()
    {
        $this->loadEnvironment();
    }

    public function call($action, $params = null)
    {
        $foxyData = array();
        $foxyData["api_token"] = $this->token;
        $foxyData["api_action"] = $action;

        if (is_array($params)) {
            $foxyData = array_merge($foxyData, $params);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://" . $this->domain . "/api");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $foxyData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        $response = trim(curl_exec($ch));

        if ($response === false) {
            throw new \Exception("CURL Error: " . curl_error($ch));
        }

        $foxyResponse = simplexml_load_string($response, NULL, LIBXML_NOCDATA);

        return $foxyResponse;
    }
    
    private function loadEnvironment()
    {
        $this->token = getenv('FOXYCART_TOKEN');

        if ($this->token === false) {
            throw new \Exception("Please set the environment variable FOXYCART_TOKEN to your api token.");
        }

        $this->domain = getenv('FOXYCART_DOMAIN');

        if ($this->domain === false) {
            throw new \Exception("Please set the environment variable FOXYCART_DOMAIN to your shop's domain.");
        }
    }
}
