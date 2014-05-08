<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
if(isset($_POST['data'])){
	$strRecive = stripslashes($_POST["data"]);
	$arrData = json_decode($strRecive,true);
	if (count($arrData) ==16 ){
		$screenName= $arrData['screenName'];
		$password= $arrData['password'];
		$firstName= $arrData['firstName'];
		$lastName= $arrData['lastName'];
		$isActive =  $arrData['isActive'];
		$email = $arrData['email'];
		$officePhone  = $arrData['officePhone'];
		$mobilePhone  = $arrData['mobilePhone'];
		$facebook  = $arrData['facebook'];
		$instragram  = $arrData['instragram'];
		$tweeter  = $arrData['tweeter'];
		$skype  = $arrData['skype'];
		$line  = $arrData['line'];
		$preferredLang  = $arrData['preferredLang'];
		$imei  = $arrData['imei'];
		$deviceID  = $arrData['deviceID'];
		$sql = "Insert into  customers (screenName,password,firstName,lastName,isActive,email,officePhone,mobilePhone,facebook,instragram,tweeter,skype,line,preferredLang,imei,deviceID) ".
			" values ('". $screenName ."','". $password ."','". $firstName ."','".  $lastName ."','".   $isActive ."','".   $email ."','".   $officePhone ."','".   $mobilePhone."','".   $facebook."','".   $instragram."','".   $tweeter."','".   $skype."','".   $line."','".   $preferredLang ."','".   $imei."','".   $deviceID."')";
		if( query($sql)) {
			$result_data =array(
			 "screenName"=>$screenName,
			"lastName"=>$lastName,
			"email"=>$email
			 );
			 $results[]= $result_data;
			SuccessRegister($results);
		}else{
			$result_data =array(
			 "SQL"=>$sql
			 );
		 $results[]= $result_data;
			databaseError($results);
		}
	}else{
		$result_data =array(
			 "ParametersCount"=>count($arrData)
			 );
		 $results[]= $result_data;
		 invalidParams($results);	
	}

}else{
		$result_data =array(
			 "Parameters"=>count($arrData)
			 );
		 $results[]= $result_data;
		 invalidParams($results);	
}

function databaseError($data){
	$params[] =array(
			"status"=>"-1",
			"msg"=>"Can not insert into database !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function invalidParams($data){
	$params[] =array(
			"status"=>"0",
			"msg"=>"Invalid parameters supplied ",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function SuccessRegister($data){
	$params[] =array(
			"status"=>"1",
			"msg"=>"Registed  ",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}

?>