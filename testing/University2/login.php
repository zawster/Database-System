<?php include "server.php";
	if(isset($_GET['id'])){
		session_destroy();
	}
  ?>
<html>
<head>
	<title>User Login</title>
</head>
<style>
input[type=text],input[type=password] {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  
}

input[type=submit]{
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
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
h3{color: Red;}

div {
  border-radius: 5px;
  background-color: #D3D3D3;
  padding: 20px;
}
</style>
<body>
	
	<div align="center">
		<h1>LOGIN FORM </h1>
		<h3>       
		    <?php
		            if (isset($_GET["Message"])) {
		              echo $_GET["Message"];
		              unset($_GET["Message"]);
		            }   		    
		      ?>
		</h3>
		<form action="login.php" method="POST" enctype="multipart/form-data">
			<div>
				  <input type="text"  name="rollno" placeholder="Enter your roll number.." required ><br>
				  <input type="password"  name="pass1" placeholder="Enter your Password.." required><br>
				  <input type="password"  name="pass2" placeholder="Repeat  Password.." required><br>
				  <input type="submit" value="LOGIN" >
			</div>
		</form>
	</div>
		<?php 
		
		 


	if (isset($_POST['rollno'])){
		$roll=$_POST['rollno'];
		$pass1=$_POST['pass1'];
		$pass2=$_POST['pass2'];
		if ($pass1 == $pass2) {
			$qry="Select uid,name FROM users WHERE uid = '".$roll."' AND password = '".$pass1."'";
			$res=$con->query($qry);
			if ($res->num_rows>0){
				$row=$res->fetch_assoc();
				session_start();
				$_SESSION['uid'] = $row['uid'];
				$_SESSION['name'] = $row['name'];
				header("Location:dashboard.php");
			}
			else{
				$msg="Invalid rollno and password!";
				header("Location:login.php?Message=$msg");
			}
		}
		else{
			$msg="Please Enter Your Correct Password!";
			header("Location:login.php?Message=$msg");
		}

	}
	
 ?>
</body>
</html>