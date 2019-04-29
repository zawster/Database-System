<?php include "server.php"; ?>

<!DOCTYPE html>
<html>
<style>
div {
  border-radius: 5px;
  background-color: #D3D3D3;
  padding: 20px;
}
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  text-align: center;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 30%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  
}
h1 {
	margin-top: 50px;
	margin-bottom: 30px;
}
input[type=submit]:hover {
  background-color: #000000;
}
input[type=button]:hover {
  	background-color: #4CAF50;
  	text-decoration: none;
}
a {
	text-decoration: none;
}
#anchor {float: right;}

</style>


<head>
	<title>Student Records</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
		

	<div>
		<h1 align="center">Searching Student<a href="index.php" id="anchor"><button class="btn btn-primary">Home Page</button></a></h1>
   	  <form action="search.php" method="POST"> 
   	  	<div align="center">
    		<input type="text"  name="rollno" placeholder="Enter your Roll Number Like P12-1111" required ><br>
    		<input type="submit" value="Search">
    	</div>
    </div>

    <?php 
    	
    	if (isset($_GET['id'])) {
    		$_POST['rollno']=$_GET ['id'];
    		 unset($_GET['id']);
    	}
    	unset($_GET['id']);
		if (isset($_POST["rollno"])) {
			$roll = $_POST["rollno"];
			$qry = "SELECT * FROM student WHERE roll_no LIKE '".$roll."'";
			$qry1 = "SELECT * FROM Cources cs,registered reg Where roll_no ='".$roll."' AND cs.code LIKE reg.code;";
			$qry2 = "SELECT * FROM Cources cs WHERE code != all(SELECT code FROM registered Where roll_no LIKE '".$roll."');";

			$res = $con->query($qry);
			$res1 = $con->query($qry1);
			$res2 = $con->query($qry2);


			$result = "";
		//	echo $qry;
		
			if ($res->num_rows>0) {
				$result .= "<div><table align='center' class=table > <thead class=thead-dark>";
				$result .= "<th>Roll No</th><th>Name</th><th>Father Name</th><th>Gender</th><th>Contact</th><th>Address</th>";
				while ($row = $res->fetch_assoc()) 
				{
					//one row
					$result .= "<tr>
									<td>
										".$row['roll_no']."
									</td>
									<td>
										".$row['st_name']."
									</td>
									<td>
										".$row['f_name']."
									</td>
									<td>
										".$row['gender']."
									</td>
									<td>
										".$row['contact']."
									</td>
									<td>
										".$row['address']."
									</td>
								</tr>";
				}
				$result .= "</thead> </table><hr></div>";
				//
				//	Registered
				//
				$result2="";
				
				$result2 .= "<div><h1 align='center'>Register Cources</h1><hr><table align='center'  class=table><thead class=thead-dark>";
				$result2 .= "<th>Cource Code</th><th>Cource Name</th><th>Credits</th>";
					if ($res1->num_rows>0) {
					while ($row1 = $res1->fetch_assoc()) 
					{
					//one row
						$result2 .= "<tr>
									<td>
										".$row1['code']."
									</td>
									<td>
										".$row1['cource_name']."
									</td>
									<td>
										".$row1['credits']."
									</td>
			
									
								</tr>";
					}
					$result2 .= "</thead></table><hr></div>";
				}
				else{
					$result2 = "<div><h1 align='center'>Register Cources</h1><hr><br><h5 align='center'>No Registered Cources!</h5><hr></div>";
				}
				//
				//     Available
				//
				$result3="";
				$result3 .= "<div><h1 align='center'>Available Cources</h1><hr><table align='center'  class=table><thead class=thead-dark>";
				$result3 .= "<th>Cource Code</th><th>Cource Name</th><th>Credits</th><th>Register</th>";
				if ($res2->num_rows>0) {
					while ($row1 = $res2->fetch_assoc()) 
					{
					
						$result3 .= "<tr>
									<td>
										".$row1['code']."
									</td>
									<td>
										".$row1['cource_name']."
									</td>
									<td>
										".$row1['credits']."
									</td>
									<td>
										".'<a href="./courceReg.php?code='.$row1['code'].'&id='.$roll.'"><input type="button" name="code" value="Register" class="btn btn-secondary" ></a>'."
									</td>
									
								</tr>";
					}
					$result3 .= "</thead></table><hr></div>";
				}
				else{
					$result3 = "<div><h1 align='center'>Available Cources</h1><hr><br><h3 align='center'>There is no available cources to register!</h3><hr></div>";
				}

			}
			else{// ($res->num_rows <=0) {
				$result .= "<div align="."center"."> <h2>"." No Record Found..."."</h2></div>";
			}
			echo $result;
			echo $result2;
			echo $result3;
		}

     ?>
     <div >
      <font color="black" size="5" face="monotype corsiva" class="marq">
      
    <marquee  scrollamount="6" behavior="scroll" height="100" width:100% direction="left"
      onmouseover="this.stop();" onmouseout="this.start();">
     Hello World! This is Muhammad Ahsan,<br>
     ------     This is my first web base assignment using PHP and MySQL.<br>
     ------     For more updates state tunned and keep visiting this page.
    
   </marquee></font></div>
    


</body>
</html>