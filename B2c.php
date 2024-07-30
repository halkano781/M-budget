<?php
include 'accessToken.php';
include 'securitycridential.php';
$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
$InitiatorName = 'testapi';
$pass = "Safaricom999!*!";
$BusinessShortCode = "600983";
$phone = "254708374149";
$amountsend = '1';
$SecurityCredential ='Bf9nfIlO6z2GerIFyu54AgGpzVUFee2i+kRXtyJkVmOCqTKtyc3CgkATIjutlQKZr1hKzQ40LVriKTAqbLyqes+X3XhUURqixotv5tvBxWUrgK459jUv3hgPj7aG55WHBlmjHvMFpgT18Xlu23irZiZ+IgdS7IJk8aN0FDIcoPhzRGS/9NaUlU8HqlTQIp0/GXRfz4N86f8yF9nqej9G5E34YRXb4U+wNFP9ztxpbCvi/dYxPpJ7WuoPY8Y+NBnjUNCxrbZ/8y62Eh79GGFfykuPv8hqEXh0Rrhxa9rxcLGNycpt+bz/HqIysFgCSuHA7K9D+POKD9NYhQ+hJPORDg==';
$CommandID = 'SalaryPayment'; // SalaryPayment, BusinessPayment, PromotionPayment
$Amount = $amountsend;
$PartyA = $BusinessShortCode;
$PartyB = $phone;
$Remarks = 'Umeskia Withdrawal';
$QueueTimeOutURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/b2cCallbackurl.php';
$ResultURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/dataMaxcallbackurl.php';
$Occasion = 'Online Payment';
/* Main B2C Request to the API */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2c_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token]);
$curl_post_data = array(
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;