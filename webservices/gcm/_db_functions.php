<?php
include_once 'db_connect.php';
class DB_Functions {
	private $db;
	function __construct(){
		$this->db = new DB_Connect();
		$this->db->connect();
		mysql_query("SET NAMES UTF8");
	}
	function __destruct() {
	
	}
	public function getAllUsers() {
		$sql = "SELECT cusID as id,CONCAT(firstName,' ',lastname) as name,email, deviceID as gcm_regid, SYSDATE() as created_at from customers where  deviceType =2";
		$result=mysql_query($sql);
		return $result;
	}
	
	public function storeUser($name,$email,$gcm_regid){
		$result = mysql_query("INSERT INTO gcm_users(name, email, gcm_regid, created_at) VALUES('$name', '$email', '$gcm_regid', NOW())");
		if($result){
			$id = mysql_insert_id();
			$result = mysql_query("SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
			if (mysql_num_rows($result) > 0) {
				return mysql_fetch_array($result);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}
?>