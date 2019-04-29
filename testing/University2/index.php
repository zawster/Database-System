<html>
<head>
	<title>Uplading Images</title>
</head>
<!-- //////////////////////////////////////// -->

<style>
input[type=text],input[type=password],select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button] {
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
h3{
	color: red;
}

div {
  border-radius: 5px;
  background-color: #D3D3D3;
  padding: 20px;
}
</style>
<!-- ///////////////////////////////////////////////////////////////////////////////// -->
<body>
	<div ><h1 align="center">Registration From</h1>    
		<h3 align="center">
		    <?php
		            if (isset($_GET["Message"])) {
		              echo $_GET["Message"];
		              unset($_GET["Message"]);
		            }
		       		    
		      ?>
		</h3>
		</div>
	<form action="register.php" method="POST" >

		<div align="center">
		    
		    <input type="text"  name="rollno" placeholder="Enter your roll number.." required ><br>

		    
		    <input type="text"  name="Name" placeholder="Your Name.." required ><br>

		    
		    <input type="text"  name="Fname" placeholder="Your Father Name.." required>

		    <br>
		    <select  name="gender">
		      <option>Gender</option>
		      <option value="Male">Male</option>
		      <option value="Female">Female</option>
		      <option value="other">Other</option>
		    </select>

		     
		    <br><input type="text"  name="contact" placeholder="Enter your Contact.." requlired>

		    <br><input type="password"  name="pass" placeholder="Enter your Password.." required><br>

		   
		  
		    <div><input type="submit" value="SIGNUP STUDENT" ></div>
		    <div><a style="text-decoration:none" href="./login.php">
		    <input type="button" value="Already registered?  LOGIN" >
		   </a></div>

		  
		   
		</div>
	</form>
</body>
</html>