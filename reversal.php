<?php
include 'accessToken.php';
include 'securitycredentils.php';
$ReversalsUrl = 'https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request';
$request_data = array(
    'Initiator' => 'testapi',
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => 'TransactionReversal',
    'TransactionID' => 'OEI2AK4Q16',
    'Amount' => '1',
    'ReceiverParty' => '600992',
    'RecieverIdentifierType' => '11',
    'QueueTimeOutURL' => 'http://mbudgetkenya.online/mbudget/QueueTimeOutURL.php',
    'ResultURL' => 'http://mbudgetkenya.online/mbudget/ResultURL.php',
    'Remarks' => 'Test',
    'Occasion' => 'work',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $ReversalsUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>