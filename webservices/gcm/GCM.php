<?php
	class GCM {
	// constructor
	function __construct() {
	
	}
	public function send_notification($registatoin_ids, $message) {
		include_once 'config.php';
		$url = 'https://android.googleapis.com/gcm/send';
		$fields = array(
			'registration_ids' => $registatoin_ids,
			'data' => $message,
			); 
//		$headers = array('Authorization: key=AIzaSyAABXAXSBFRuuLg0VMnahSlyQgjlQvEOx8', 'Content-Type: application/json');
		$headers = array("Authorization: key=AIzaSyBbr14BGXLfy5MAJEP1llk3TSLOm_JXPjw","Content-Type: application/json");
		$ch =curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result=curl_exec($ch);
		if($result === FALSE){
			die('Curl failed: ' . curl_error($ch));
		}
		curl_close($ch);
		echo $result;
	}
}
?>