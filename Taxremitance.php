<?php 
include 'accesstoken.php';
include 'securitycredentils.php';

$Taxremitanceurl = 'https://sandbox.safaricom.co.ke/mpesa/b2b/v1/remittax';
$request_data = array(
    'Initiator'=>'testapi',
   'SecurityCredential'=>$SecurityCredential,
   'CommandID'=> 'PayTaxToKRA',
   "SenderIdentifierType"=> "4",
   "RecieverIdentifierType"=>"4",
   "Amount"=>"239",
   "PartyA"=>"600997",
   "PartyB"=>"572572",
   "AccountReference"=>"353353",
   "Remarks"=>"OK",
   'QueueTimeOutURL' => 'http://mbudgetkenya.online/mbudget/QueueTimeOutURL.php',
    'ResultURL' => 'http://mbudgetkenya.online/mbudget/ResultURL.php',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $Taxremitanceurl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
echo $response = curl_exec($curl);

?>