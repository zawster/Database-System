<?php 
	include "server.php";

	$rollno=$_POST["rollno"];
	$Name=$_POST["Name"];
	$Fname=$_POST["Fname"];
	$gender=$_POST["gender"];
	$contact=$_POST["contact"];
	$address=$_POST["address"];
	
	

	$qry = "INSERT INTO student VALUES('".$rollno."','".$Name."','".$Fname."', '".$gender."', '".$contact."', '".$address."')";
	
	if ($con->query($qry)) {
		$msg = "Registered Successfuly";
	}
	else{
		$msg = "Error!";
	}
    header("Location:index.php?Message=$msg");
	



 ?>