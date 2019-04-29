<?php 
	include "server.php";

	$rollno=$_POST["rollno"];
	$Name=$_POST["Name"];
	$Fname=$_POST["Fname"];
	$gender=$_POST["gender"];
	$contact=$_POST["contact"];
	$pass=$_POST["pass"];
	
	

	$qry = "INSERT INTO users VALUES('".$rollno."','".$Name."','".$Fname."', '".$gender."', '".$contact."', '".$pass."')";
	
	if ($con->query($qry)) {
		$msg = "Registered Successfuly";
		header("Location:login.php?Message=$msg");
	}
	else{
		$msg = "Registration Error!";
		header("Location:index.php?Message=$msg");
	}
    
	



 ?>