<?php  
	include "connect.php";


	$courceID=$_GET ['code'];
	$rollno=$_GET ['roll'];

	$query = "INSERT INTO registered VALUES('".$rollno."','".$courceID."')";
	
	
	$con->query($query);
	
	header("Location:search.php");
?>
