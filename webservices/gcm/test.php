<?php
include_once('db_functions.php');
$db = new DB_Functions();
$users=$db->getAllUsers();
if ($users != false)
	$no_of_users = mysql_num_rows($users);
else
	$no_of_users=0;
echo $no_of_users;
?>