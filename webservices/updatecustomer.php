<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
include_once('incJsonMsg.php');
if(isset($_POST['data'])){
	$strRecive = stripslashes($_POST["data"]);
	$arrData = json_decode($strRecive,true);
	if (count($arrData) ==14 ){
		$email = $arrData['email'];
		$screenName = $arrData['screenName'];
		$firstName = $arrData['firstName'];
		$lastName= $arrData['lastName'];
		$officePhone= $arrData['officePhone'];
		$mobilePhone = $arrData['mobilePhone'];
		$facebook= $arrData['facebook'];
		$instragram = $arrData['instragram'];
		$tweeter= $arrData['tweeter'];
		$skype = $arrData['skype'];
		$line= $arrData['line'];
		$preferredLang = $arrData['preferredLang'];
		$avatar = $arrData['avatar'];
		$imei = $arrData['imei'];

//		$isDeleted = $arrData['isDeleted'];
//		$deviceID = $arrData['deviceID'];
//		$deviceType = $arrData['deviceType'];	
//		$isActive = $arrData['isActive'];
//		$password= $arrData['password'];
	 
		$sql ="Select cusID from customers Where email='". $email ."'";
		$result = query($sql);
		$cusID = 0;
		$rownum = mysql_num_rows($result);
		$row = mysql_fetch_row($result);
		if ($rownum == 0 ){
			$result_data =array( "Email"=>$email );
			$results[]= $result_data;
			NotExistsCustomerbyEmail($results);
		}else{
			$cusID = $row[0];
			$sql ="Select count(*)  as nExists   from customers Where screenName='". $screenName ."' and cusID != ".$cusID  ;
			$resultScreen= query($sql);
			$row = mysql_fetch_row($resultScreen);
			$nExists = (int)$row[0];
			if ($nExists > 0){
				$result_data =array("nExists"=>$nExists,"screenName"=> $screenName  );
				$results[]= $result_data;
				ExistsScreenName($results);
			}else{
				$sql = "Update customers set screenName='".  Addslashes($screenName) ."',firstName='".  Addslashes($firstName) ."',lastName='".  Addslashes($lastName) ."',officePhone='". $officePhone ."',mobilePhone='". $mobilePhone ."',facebook='".  Addslashes($facebook) ."',instragram='".  Addslashes($instragram) ."',tweeter='".  Addslashes($tweeter) ."',skype='". Addslashes( $skype) ."',line='".  Addslashes($line) ."',preferredLang='".  Addslashes($preferredLang )."',imei='".  Addslashes($imei )."',avatar='".  Addslashes($avatar) ."' Where cusID=". $cusID;
				if(query($sql)) {
					$result_data =array(
					 "cusID"=>$cusID,
					 "Email"=>$email,
					 );
					 $results[]= $result_data;
					SuccessProcess($results);
				}else{
					$result_data =array("SQL"=>$sql );
					$results[]= $result_data;
					databaseError($results);
				}
			}
		}
	}else{
		$result_data =array( "ParametersCount"=>count($arrData));
		 $results[]= $result_data;
		 invalidParams($results);	
	}
}
?>
