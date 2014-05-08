<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
include_once('incJsonMsg.php');
if(isset($_POST['data'])){
	$strRecive = stripslashes($_POST["data"]);
	$arrData = json_decode($strRecive,true);
	if (count($arrData) ==10 ){
		$email = $arrData['email'];
		$BY_COMPANY= $arrData['BY_COMPANY'];
		$BY_CATEGORY= $arrData['BY_CATEGORY'];
		$DOWNLOAD_PERMISION= $arrData['DOWNLOAD_PERMISION'];
		$HOME_SCREEN= $arrData['HOME_SCREEN'];
		$BY_PRODUCT =  $arrData['BY_PRODUCT'];
		$BY_GROUP = $arrData['BY_GROUP'];
		$notificationOnOff = $arrData['notificationOnOff'];
		$alertType = $arrData['alertType'];
		$soundFile = $arrData['soundFile'];

		$sql ="Select cusID from customers Where email='". $email ."'";
		$result = query($sql);
		$cusID = 0;
		$rownum = mysql_num_rows($result);
		$row = mysql_fetch_row($result);
		if ($rownum == 0 ){
			$result_data =array(
			 "Email"=>$email
			 );
			$results[]= $result_data;
			NotExistsCustomerbyEmail($results);
		}else{
			$cusID = $row[0];
		}

		$sql ="Select count(*) from customer_setting Where cusID='". $cusID ."'";
		$result = query($sql);
		$row = mysql_fetch_row($result);
		$nExists = (int)$row[0];
		if ($nExists== 0 ){
				$sql = "Insert into  customer_setting (cusID,downloadPermision,homeScreenType,prodCategories,prodGroups,products,Companies,notificationOnOff,alertType,soundFile) ".
			" values ('". $cusID ."','". $DOWNLOAD_PERMISION ."','". $HOME_SCREEN ."','".  $BY_CATEGORY ."','".   $BY_GROUP ."','".   $BY_PRODUCT ."','".   $BY_COMPANY ."','".   $notificationOnOff ."','".   $alertType ."','".   $soundFile ."')";
		}elseif ($nExists==1){
			$sql = "Update customer_setting set downloadPermision='". $DOWNLOAD_PERMISION ."',homeScreenType='".  $HOME_SCREEN ."',prodCategories='".$BY_CATEGORY ."',prodGroups='".$BY_GROUP ."',products='".$BY_PRODUCT  ."',Companies='". $BY_COMPANY ."',notificationOnOff='". $notificationOnOff ."',alertType='". $alertType ."',soundFile='". $soundFile ."' Where cusID=". $cusID;
		}
		if( query($sql)) {
			$result_data =array(
			 "cusID"=>$cusID,
			 "Email"=>$email,
			 );
			 $results[]= $result_data;
			SuccessProcess($results);
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

?>