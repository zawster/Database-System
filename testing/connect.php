<?php
	$server = "localhost";
	$user = "root";
	$pass = "admin123";
	$dbname = "my_website_data";

	$con = new MySQLi($server , $user , $pass , $dbname);

	if($con->connect_error)
		echo "error".$con->connect_error;
	?>