<html>
<head>
	<title>Stored Procedure</title>
</head>
<body>
	<center>
	<form action="" method="POST">
		<input type="text" name="val" placeholder="Enter a number" required><br>
		<input type="submit" value="Check" name='submit'>
	</form>

	<?php 
	if (isset($_POST['submit'])){
		include "server.php";
		$val = $_POST['val'];
		
		$qury = " set @t=1 ;"; // output variable
		$con->query($qury);
		$qury = "call odd_even(@t,".$val.");"; $con->query($qury);
		
		
		$qury1 = " Select @t as t ;";
		$result = mysqli_query($con,$qury1) or die("Query fail: ".mysqli_error());
		
		$res=$con->query($qury1);
		
		if ($row = $res->fetch_assoc()) {
			echo " ".$row['t']." ";
		}
		
	}
	else {
		echo "Please Enter a number: ";
	}

	 ?>
	 </center>
</body>
</html>