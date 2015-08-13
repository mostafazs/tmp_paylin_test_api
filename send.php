<?php 
	//include our cURL functions
	include_once("sender.php");



//$url =' http://payline.ir/payment-test/gateway-76389';
$url ='http://payline.ir/payment-test/gateway-send'; 
$api_test = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567'; 
$amount = 1000; 
$redirect = urlencode('http://manasaman.host22.com/payline/callback.php');
$result = send($url,$api_test,$amount,$redirect); 
if($result > 0 && is_numeric($result)){ 
//create a file for save $id_get value : this is nod good way : just for testing
$fh=fopen("value.txt","w")  or die("Unable to open file!");
$res=fwrite($fh,$result);
fclose($fh);
//here we save $result number no database , for verify it in page callback.php
$go ="http://payline.ir/payment-test/gateway-$result";
header("Location: $go"); 
}
else {
	echo "Error";
	echo "<br/>";
	var_dump($result);
}