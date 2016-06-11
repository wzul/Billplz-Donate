<?php
function DapatkanLink($data)
{
	$api_key = ''; //add api key here
	$host    = 'https://www.billplz.com/api/v3/bills/';
	$process = curl_init($host);
	curl_setopt($process, CURLOPT_HEADER, 0);
	curl_setopt($process, CURLOPT_USERPWD, $api_key . ":");
	curl_setopt($process, CURLOPT_TIMEOUT, 30);
	curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($process, CURLOPT_POSTFIELDS, http_build_query($data));
	$return = curl_exec($process);
	curl_close($process);
	$json = json_decode($return, true);
	return $json;
}
//number intelligence
$custTel  = preg_replace("/[^0-9]/", "", $_POST['number']);
$custTel2 = substr($custTel, 0, 1);
if ($custTel2 == '+') {
	$custTel3 = substr($order->billing_phone, 1, 1);
	if ($custTel3 != '6')
		$custTel = "+6" . $order->billing_phone;
} else if ($custTel2 == '6') {
} else {
	if ($custTel != '')
		$custTel = "+6" . $custTel;
}
//number intelligence
$str    = file_get_contents(__DIR__ . "/saved.json");
$json   = json_decode($str, true);
$tranID = $json['amount'];
$data   = array(
	'collection_id' => '', //add collection id here
	'email' => $_POST['email'],
	'mobile' => $custTel,
	'name' => $_POST['name'],
	'amount' => $_POST['amount'] * 100,
	'reference_1_label' => "Total Donation",
	'reference_1' => "RM" . $tranID,
	'description' => "Donation to Billplz Plugin/Module/Extensions Development",
	'redirect_url' => "https://localhost/display.php", //change your domain
	'callback_url' => "https://localhost/callback.php" //change your domain
);
$arr    = DapatkanLink($data);
if (isset($arr['error'])) {
	$data = array(
		'collection_id' => '', //add collection id here
		'email' => $_POST['email'],
		'name' => $_POST['name'],
		'amount' => $_POST['amount'] * 100,
		'reference_1_label' => "Total Donation",
		'reference_1' => "RM" . $tranID,
		'description' => "Donation to Billplz Plugin/Module/Extensions Development",
		'redirect_url' => "https://localhost/display.php", //change your domain
		'callback_url' => "https://localhost/callback.php" //change your domain
	);
	$arr  = DapatkanLink($data);
}
$url_from_link = $arr['url'];
header("Location: " . $url_from_link);
?>