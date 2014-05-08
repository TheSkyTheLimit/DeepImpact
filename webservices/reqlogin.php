<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');

if (isset($_GET['uid'])){
	$uid= $_GET['uid'];
	$sql = "Select userID,userName,firstName,lastName,isAdmin from admin Where isDeleted=0 and userName='".$uid."'"; 
	$result = query($sql);
	$num = mysql_num_rows($result);
	if ($num > 0){
		while ($rs = mysql_fetch_array($result))
		{
			$json_data[] =array(
			"userID"=>$rs["userID"],
			"userName"=>$rs["userName"],
			"firstName"=>$rs["firstName"],
			"lastName"=>$rs["lastName"],
			);	
			$json= json_encode($json_data);
			echo $json;
		}
	}else{
		$err_data[] =array(
			"errCode"=>"-1",
			"errDesc"=>"No data found !", 
			);
		$err= json_encode($err_data);
		echo $err;
	}
}
?>