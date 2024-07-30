<?php
header("Content-Type: application/json");
echo $QueueTimeOutURLCallbackResponse = file_get_contents('php://input');
$logFile = "ResultURL.json";
$log = fopen($logFile, "a");
fwrite($log, $QueueTimeOutURLCallbackResponse);
fclose($log);