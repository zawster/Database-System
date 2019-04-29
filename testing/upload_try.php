<?php 
	include "connect.php";

	session_start();
	// $folder = $_SESSION['folder'];
	// $tmp_name=$_SESSION['tmp_name'];
	// $unique_name=$_SESSION['uniqname'];


	$roll=$_SESSION['roll'];
	$folder="uploads/";
	$file_name=$_FILES['txtfile']['name'];
	$tmp_name=$_FILES['txtfile']['tmp_name'];
	$temp=explode('.',$file_name);
	$exten=end($temp);
	$unique_name=substr(md5(time()),0, 10);
	
	if ($exten != "") {
		$unique_name.='.'.$exten;
		$Path=$folder.$unique_name;
	

	$qury = "insert into gallaries VALUES('".$roll."','".$unique_name."')";

	if($con->query($qury)){    
    	if (move_uploaded_file($tmp_name, $Path)) {
  				unset($_FILES['image']);
    			$msg='Image Upload Successfully!';
		}
   		else{
    		$msg='Image Upload Faild!';
   		}
	}
	header("Location:home.php?msg=$msg");
}

 ?>