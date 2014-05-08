<?php 
function invalidParams($data){
	$params[] =array(
			"status"=>"0",
			"msg"=>"Invalid parameters supplied ",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function databaseError($data){
	$params[] =array(
			"status"=>"-1",
			"msg"=>"Sql data error !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function ExistsEmail($data){
	$params[] =array(
			"status"=>"-2",
			"msg"=>"This email already registed !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function ExistsScreenName($data){
	$params[] =array(
			"status"=>"-3",
			"msg"=>"Your name already used by another customer !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}

function NotExistsCustomerbyEmail($data){
	$params[] =array(
			"status"=>"-5",
			"msg"=>"Your email not existing registered !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function Loginfailed($data){
	$params[] =array(
			"status"=>"-4",
			"msg"=>"Your login failed due to an invalid e-mail or password input  !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function ExistsMobile($data){
	$params[] =array(
			"status"=>"-6",
			"msg"=>"Your mobile phone already used by another customer !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function NotExistsEmei($data){
	$params[] =array(
			"status"=>"-7",
			"msg"=>"IMEI does not exist !!",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
function SuccessProcess($data){
	$params[] =array(
			"status"=>"1",
			"msg"=>"Success  ",
			"data"=> $data
			);	
	echo json_encode($params);
	exit;
}
?>