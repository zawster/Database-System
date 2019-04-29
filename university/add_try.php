<?php 
	  include "connect.php"; 

	$CourceCode=$_POST["txtid"];
	$CourceName=$_POST["txtName"];
	$Credits=$_POST["credits"];

	
	

	$query = "INSERT INTO cources VALUES('".$CourceCode."','".$CourceName."','".$Credits."')";
	
	if ($con->query($query)) {
		$msg = "Successfuly Cource Added ";
	}
	else{
		$msg = "Error in Cource Adding";
	}
	
 
    header("Location:add.php?msg=$msg");

 ?>
