<?php 
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
include_once('incJsonMsg.php');
$results = array();

if(isset($_POST['data'])){
	$strRecive = stripslashes($_POST["data"]);
	$arrData = json_decode($strRecive,true);
	$sql = "SELECT count(*) as nExists  FROM customers  Where screenName='" . $arrData['screenName'] ."'"; 
	$result = query($sql);
	$row = mysql_fetch_row($result);
	$nExists = (int)$row[0];
  	 if ($nExists ==0)  {
		$row = mysql_fetch_object($result);
			$version_data =array(
			 "nExists"=>$nExists,
			"screenName"=>$arrData['screenName']
			 );
		 $results[]= $version_data;
		 SuccessProcess($results);
    }else{
		$version_data =array(
			 "nExists"=>$nExists,
			"screenName"=>$arrData['screenName']
			 );
		 $results[]= $version_data;
		 ExistsScreenName($results);
	}
}else{

	$result_data =array(
			 "ParametersCount"=>"0"
			 );
		 $results[]= $result_data;
		invalidParams( $results);
}
?>