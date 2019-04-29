<?php 
	  include "server.php"; 

	$code=$_POST["code"];
	$Name=$_POST["cname"];
	$credits=$_POST["credits"];

	
	

	$qry = "INSERT INTO Cources VALUES('".$code."','".$Name."','".$credits."')";
	
	if ($con->query($qry)) {
		$msg = "Cource add Successfuly";
	}
	else{
		$msg = "Error!";
	}
	
 
    header("Location:cource.php?Message=$msg");

 ?>