<?php
	//php code here
	$server = "localhost";
	$user = "root";
	$pass = "admin123";
	$dbname = "university2";

	$con = new MySQLi($server, $user, $pass, $dbname);

	if ($con->connect_error) 
		echo "Error: ".$con->connect_error;
?>

