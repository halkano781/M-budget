<?php
require 'vendor/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Keys
$consumerkey = $_ENV['CONSUMER_KEY'];
$consumersecret = $_ENV['CONSUMER_SECRET'];

//url 
$access_token_url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
$headers = ['Content-Type:application/json; charset=utf=8'];

$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_USERPWD, $consumerkey . ':' . $consumersecret);
$result = curl_exec($curl); 
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($result);
$access_token = $result->access_token;
curl_close($curl);