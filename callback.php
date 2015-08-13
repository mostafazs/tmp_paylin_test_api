<?php 
	//callback(redirect) file
	include_once('sender.php');
// first here is better to get $result id ( or gateway-???) id and verify ir with id that gateway post back to this file($id_get)
	
	//not good method for geting saved value
	$frh=fopen('value.txt','r') or die("Unable to open file!<br/>");
	$our_save_id_get=fread($frh,filesize('value.txt'));
	fclose($frh);

	$url ='http://payline.ir/payment-test/gateway-result-second'; 
	$api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567'; 
	$trans_id = $_POST['trans_id'];
	$id_get = $_POST['id_get'];
	if($our_save_id_get != $id_get){
		echo "Error id_get not equal to our_save_id_get<br/>";
	}
	if($id_get > 0 && is_numeric($id_get)){ 
	$result =get($url,$api,$trans_id,$id_get);
	
		switch($result){ 
		case '-1' : 
		echo 'API no correct'; 
		break; 
		case '-2' : 
		echo 'trans_id not correct.'; 
		break; 
		case '-3' : 
		echo 'id_get not correct.'; 
		break; 
		case '-4' : 
		echo 'This transaction not exist , or not success.'; 
		break; 
		case '1' : 
		echo ' transaction success.'; 
		break;
		}
		echo "<hr/>";
		var_dump($result);
		echo "<hr/>";
	}
	else
	{
		echo "id_get not > 0 or numeric";
	}
	//here we must save all(in fact update) this info to database for future support of customer