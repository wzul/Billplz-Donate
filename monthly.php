<?php
$iv = json_encode(array(amount => "0.00"));
$f = fopen(__DIR__."/saved.json", "w");
fwrite($f, print_r($iv, true));
fclose($f);
?>