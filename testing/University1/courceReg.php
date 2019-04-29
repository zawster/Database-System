<?php  
	include "server.php";


	$roll=$_GET ['code'];
	$id=$_GET ['id'];

	$qry = "INSERT INTO registered VALUES('".$id."','".$roll."')";
	
	
	if($con->query($qry)) {
		$msg = "Registered Successfuly";
	}	
	else{
		$msg = "Error!";
	}
	//echo $msg;
	//echo "<script type='text/javascript'> alert('$msg');</script>";
	header("Location:search.php?id=$id");
?>