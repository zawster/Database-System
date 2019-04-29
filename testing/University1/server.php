<?php
	$server = "localhost";
	$user = "root";
	$pswd = "amin123";
	$dbname = "university";

// Create connection
	$con = new mysqli($server, $user, $pswd,$dbname);

// Check connection
	if ($con->connect_error) {
    	echo "Connection failed: <br> ";
	}
	else{
		//echo "Connected successfully <br>";
	}
?> 




	