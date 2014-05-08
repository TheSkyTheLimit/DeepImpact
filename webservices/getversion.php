<?php 
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
include_once('dbconnect.php');
  $sql = "SELECT ConfigID,Version,LastUpdate FROM `configurations` limit 1"; 
  $result = query($sql);
  $results = array();
  $num = mysql_num_rows($result);
  	 if ($num ==1)  {
		$row = mysql_fetch_object($result);
			$version_data =array(
			 "Version"=>$row->Version,
			"LastUpdate"=>$row->LastUpdate
			 );
		 $results[]= $version_data;
    }
SuccessProcess($results);
function SuccessProcess($data){
		$params[] =array(
			"status"=>"1",
			"msg"=>"Success return version data",
			"data"=> $data
			);	
		echo json_encode($params);
}
?>