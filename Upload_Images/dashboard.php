<?php 
	include "server.php";
	session_start();
	if(!isset($_SESSION['uid'])){
		header("Location:login.php");
	}
	$name = $_SESSION['name'];

 ?>
 <html>
 <head>
 	<title>Dashboad of User</title>
 </head>
 <style>
 	div {
	  border-radius: 5px;
	  background-color: #D3D3D3;
	  padding: 20px;
	}
	input[type=submit],input[type=button]{
	  width: 20%;
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 5px;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	  
	}
	input[type=submit]:hover {
  		background-color: #000000;
	}
	input[type=button]:hover {
  		background-color: #000000;
	}
	input[type=file]:hover {
  		background-color: #4CAF50 ;
	}
	img {
  		border: 1px solid #4CAF50; /* Gray border */
  		border-radius: 4px;  /* Rounded border */
		padding: 10px; /* Some padding */
		height: 150px;
		margin-left:5px;
	    margin-right:5px;
  		width: 200px; /* Set a small width */
	}
	a{
		text-decoration: none;
	}
	img:hover {
  		box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
  		height: 170px;
  		width: 250px;
		}
 </style>
 <body>
 	<div align="center"><h1><?php echo "Welcome  ".$name ?> </h1></div>

 	<div align="right"><a href="./login.php?id=1" ><input type="button"  value="LOGOUT" ></a> </div>
 	<div align="center">
 		<hr>
 		<form action="dashboard.php" method = "POST" enctype="multipart/form-data">
 			<h3><label>Select image to Upload</label></h3><br>
 			<input type="file" name="image"><br>
 			<input type="submit" value="Upload" OnClick="jsFun()">
 		</form>
 	
 		<?php 
		 	$uid = $_SESSION['uid'];
		 	$img = $_FILES['image']['name'];

		 	

		 	$qry2="SELECT * FROM images WHERE uid='".$uid."' AND imgName LIKE '".$uid."_%'";
			if($res=$con->query($qry2)){
			//if ($res1->num_rows>0){

				while ($row = $res->fetch_assoc()){
					$MyPhoto=$row['path'];
					echo "<img src='".$MyPhoto."'>";
				}
			}
			else{
				echo "No Pictures Available!";
			}
		
			if (isset($_FILES['image'])){
				//$qry = "INSERT INTO images VALUES('".$uid."','".$img."')";
				$TargetPath = "pictures/"; //This is the folder which you created just now
  				$TargetPath=$TargetPath;
  				$div = explode('.', $img);  // changing the name of file
  				$file_exten = strtolower(end($div));
  				if ($file_exten != ""){ 
	  				$qry1="SELECT count(imgName)  as id FROM images WHERE uid = '".$uid."'";
	  				$res1 = $con->query($qry1);
	  				$row1=$res1->fetch_assoc();
	  				$id = $row1['id'] + 1;
	  				$img = $uid.'_'.$id.'.'.$file_exten;  // final unique name
	  				$TargetPath.=$img;

	  				$qry="INSERT INTO images  VALUES('".$uid."','".$img."','".$TargetPath."')";
	  				if($con->query($qry)){    
	    				if (move_uploaded_file($_FILES['image']['tmp_name'], $TargetPath)) {
	    					unset($_FILES['image']);
	    					echo "<script>alert('Image Upload Successfully!')</script>";
	    				}
	    				else{
	    					echo "<script>alert('Image Upload Faild!')</script>";
	   					}
					}
					else{
						echo "<script>alert('Image Upload Faild!')</script>";
					}
				}
				else{
					echo "<script>alert('Please choose an Image to Upload!')</script>";
				}
				header("Refresh:0");
			}
			
 		 ?>
 		 

 	</div>
 </body>
 </html>

