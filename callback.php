<?php
$host    = 'https://www.billplz.com/api/v3/bills/' . $_POST['id'];
$process = curl_init($host);
curl_setopt($process, CURLOPT_HEADER, 0);
curl_setopt($process, CURLOPT_USERPWD, "<insert your api key here>" . ":");
curl_setopt($process, CURLOPT_TIMEOUT, 30);
curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
$return = curl_exec($process);
curl_close($process);
$arra          = json_decode($return, true);
$donatedAmount = $arra['amount'] / 100;
$amountBefore  = preg_replace("/[^0-9]/", "", $arra['reference_1']);
$str           = file_get_contents(__DIR__ . "/saved.json");
$json          = json_decode($str, true);
$tranID        = preg_replace("/[^0-9]/", "", $json['amount']);
if ($amountBefore != $tranID)
	exit;
if (!$arra['paid'])
	exit;
$iv = json_encode(array(
	"amount" => $donatedAmount + $json['amount']
));
$f  = fopen(__DIR__ . "/saved.json", "w");
fwrite($f, print_r($iv, true));
fclose($f);
?>