<?php
	include "connect.php";

	$rollnumber = $_POST["txtroll"];
	$username = $_POST["txtname"];
	$contact = $_POST["txtcontact"];
	$password = $_POST["txtpassword"];

$qury = "INSERT INTO users VALUES('".$rollnumber."','".$username."','".$contact."','".$password."')";

if($con->query($qury))
{
	echo "<script> alert(Succesfully SignUP!)</script>";
	header("Location:signin.php");
}
else 
{
	$msg = "Eror in SignUP!";
	header("Location:index.php?msg=$msg");
}



?>