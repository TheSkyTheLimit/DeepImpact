<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
include_once('incJsonMsg.php');
if(isset($_POST['data'])){
	$strRecive = stripslashes($_POST["data"]);
	$arrData = json_decode($strRecive,true);
	if (count($arrData) ==2 ){
		$avatar= $arrData['avatar'];
		$email = $arrData['email'];
	
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
			$sql = "Update customers set avatar='". $avatar ."' Where cusID=". $cusID;
			if( query($sql)) {
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
	}else{
		$result_data =array( "ParametersCount"=>count($arrData));
		 $results[]= $result_data;
		 invalidParams($results);	
	}
}
?>