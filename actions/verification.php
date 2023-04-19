<?php
use GuzzleHttp\Client;

$apiKey = '79905cbcf44b8c0f3f8b0d6f23007510d81f677cc61bc9a22b1c461a4c0d';
$url = 'https://api.quickemailverification.com/v1/verify?&apikey='.$apiKey.'&email='.$email;

$client = new Client();
$response = $client->request('GET', $url);
$result = json_decode($response->getBody());

if ($result->status == 'valid') {
    echo 'Email is valid!';
} elseif ($result->status == 'invalid') {
    echo 'Email is invalid.';
} else {
    echo 'Unable to verify email.';
}

?>