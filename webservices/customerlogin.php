<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
include_once('incJsonMsg.php');
if(isset($_POST['data'])){
	$strRecive = stripslashes($_POST["data"]);
	$arrData = json_decode($strRecive,true);
	if (count($arrData) ==3 ){
		$password= $arrData['password'];
		$email = $arrData['email'];
		$imei = $arrData['imei'];

		$sql ="Select cusID,email,screenName,password,firstName,lastName,isActive,officePhone,mobilePhone,facebook,instragram,tweeter,skype,line,preferredLang,imei,isDeleted,deviceID,deviceType,avatar  from customers Where email='". $email ."'  and password='" . $password ."'";
		$result = query($sql);
		$num = mysql_num_rows($result);
		$row = mysql_fetch_array($result);
		if ($num == 0 ){
			$result_data =array(
			 "email"=>$email,
			"password"=>$password,
			"imei"=>$imei
			 );
			$results[]= $result_data;
			Loginfailed($results);
		}else{
			if($row["imei"]!=$imei){
				$olddata[] =  array(
				"cusID"=>$row["cusID"],
				"email"=>$row["email"],
				"screenName"=>$row["screenName"],
				"password"=>$row["password"],
				"firstName"=>$row["firstName"],
				"lastName"=>$row["lastName"],
				"isActive"=>$row["isActive"],
				"officePhone"=>$row["officePhone"],
				"mobilePhone"=>$row["mobilePhone"],
				"facebook"=>$row["facebook"],
				"instragram"=>$row["instragram"],
				"tweeter"=>$row["tweeter"],
				"skype"=>$row["skype"],
				"line"=>$row["line"],
				"preferredLang"=>$row["preferredLang"],
				"imei"=>$row["imei"],
				"isDeleted"=>$row["isDeleted"],
				"deviceID"=>$row["deviceID"],
				"deviceType"=>$row["deviceType"],
				"avatar"=>$row["avatar"]);
				$result_data =array(
				 "email"=>$email,
				"password"=>$password,
				"imei"=>$imei,
				"oldregistration"=>$olddata
				 );
				$results[]= $result_data;
				NotExistsEmei($results);
			} else if ($row["password"]== $password){
				$settingSql = "Select *  from customer_setting where cusID=".  $row["cusID"];
				$resultSetting = query($settingSql);
				$settings = array();
				$allsetting = array();
				while ($rs1 = mysql_fetch_array($resultSetting)){
				  $columns = mysql_num_fields($resultSetting); 
				  for($i = 0; $i < $columns; $i++) { 
					  $fieldName = mysql_field_name($resultSetting,$i);
					  $settings[$fieldName] =  $rs1[$fieldName];
				  }
				}
				$avatar=file_get_contents('AI_logo.png');
				$allsetting[] =$settings;
				$result_data =array(
				"cusID"=>$row["cusID"],
				"email"=>$row["email"],
				"screenName"=>$row["screenName"],
				"password"=>$row["password"],
				"firstName"=>$row["firstName"],
				"lastName"=>$row["lastName"],
				"isActive"=>$row["isActive"],
				"officePhone"=>$row["officePhone"],
				"mobilePhone"=>$row["mobilePhone"],
				"facebook"=>$row["facebook"],
				"instragram"=>$row["instragram"],
				"tweeter"=>$row["tweeter"],
				"skype"=>$row["skype"],
				"line"=>$row["line"],
				"preferredLang"=>$row["preferredLang"],
				"imei"=>$row["imei"],
				"isDeleted"=>$row["isDeleted"],
				"deviceID"=>$row["deviceID"],
				"deviceType"=>$row["deviceType"],
				"avatar"=>$row["avatar"], 
	//			"avatarText"=>$row["avatarText"], 
				// "avatar"=>base64_encode($row["avatar"]), 
				// "avatar"=>base64_encode($avatar), 
				"setting"=> $allsetting,
			 );
				$results[]= $result_data;
				SuccessProcess($results);
			}else{
				$result_data =array(
				 "email"=>$email,
				"password"=>$password,
				"imei"=>$imei
				 );
				$results[]= $result_data;
				Loginfailed($results);
			}
		}
	}
}
?>