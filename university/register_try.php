<?php
	include "connect.php";

	//echo "You are here, you have a quiz?";

	$roll = $_POST["txtRollNo"];
	$name = $_POST["txtName"];
	$fname = $_POST["txtFName"];
	$gender = $_POST["sGender"];
	$contact = $_POST["txtContact"];
	$address = $_POST["txtAddress"];

	$qry = "INSERT INTO student VALUES('".$roll."','".$name."', '".$fname."', '".$gender."', '".$contact."', '".$address."')";

    
    if ($con->query($qry)) {
		$msg = "Student Registered Successfully!";
	}
	else
		$msg = "Student Registeration Error!";


        
	header("Location:index.php?Message=$msg");
    
?>










