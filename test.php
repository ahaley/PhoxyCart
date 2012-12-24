<?php

$foxyDomain = "cieditions.foxycart.com";
$foxyData = array();
$foxyData["api_token"] = "hCuP74JNVPwiWhcAUFDzNQWIgyeRWVQ9nbNp9s3Zbu83BetlK1LtKy6R1aCS";
$foxyData["api_action"] = "customer_list";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://" . $foxyDomain . "/api");
curl_setopt($ch, CURLOPT_POSTFIELDS, $foxyData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);

$response = trim(curl_exec($ch));

if ($response === false) {
    print "CURL error: \n" . curl_error($ch);
}
else {
    print "Response to customer list" . PHP_EOL;
    print $response;
}

$foxyResponse = simplexml_load_string($response, NULL, LIBXML_NOCDATA);
print "<pre>";
var_dump($foxyResponse);
print "</pre>";
