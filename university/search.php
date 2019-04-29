<?php
	include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student's Record</title>
</head>
<body>
	<form action="" method="post">
		<table align="center">
			<th colspan="2">Search Student</th>
			<tr>
				<td>
					Roll No
				</td>
				<td>
					<input type="text" name="txtRNo" required>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" value="Search">
				</td>
			</tr>
		</table>
	</form>
	<?php
		if (isset($_POST["txtRNo"])) {
			$rollno = $_POST["txtRNo"];
			$qry = "SELECT * FROM student WHERE roll_no = '".$rollno."'";
			$qry1 = "SELECT * FROM Cources,registered WHERE roll_no ='".$rollno."' AND cources.code = RegCources.code;";
			$qry2 = "SELECT * FROM Cources  WHERE code != ALL(SELECT code FROM RegCources Where roll_no LIKE '".$rollno."');";

			$res = $con->query($qry);
			$res1 = $con->query($qry1);
			$res2 = $con->query($qry2);
			



			$result = "";

			if ($res->num_rows>0) {
				$result .= "<table align='center' border=1px>";
				$result .= "<th>Roll No</th><th>Name</th><th>Father's Name</th><th>Gender</th><th>Contact No</th><th>Address</th>";
				while ($row = $res->fetch_assoc()) 
				{
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
				$result .= "</table>";
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////
			$result12="";
				
				$result12 .= "<div><h2 align='center'> Cources Registered</h2><table align='center'  border=1px>";
				$result12 .= "<th>Cource Code</th><th>Cource Name</th><th>Credits</th>";
					if ($res1->num_rows>0) {
					while ($row1 = $res1->fetch_assoc()) 
					{
					//one row
						$result12 .= "<tr>
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
					$result12 .= "</table><hr></div>";
				}
				else{
					$result12 = "<div><h1 align='center'> Cources Registered</h1><br><h3 align='center'>No Registeration</h3></div>";
				}
///////////////////////////////////////////////////////////
				$result1="";
				
				$result1 .= "<div><h2 align='center'> Cources Available</h2><table align='center'  border=1px>";
				$result1 .= "<th>Cource Code</th><th>Cource Name</th><th>Credits</th><th>Option</th>";
					if ($res2->num_rows>0) {
					while ($row1 = $res2->fetch_assoc()) 
					{
					//one row
						$result1 .= "<tr>
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
										".'<a href="./reg.php?code='.$row1['code'].'&roll='.$rollno.'"><input type="button" name="code" value="Enroll"></a>'."
									</td>
									
								</tr>";
					}
					$result1 .= "</table><hr></div>";
				}
				


			}
			else{
				$result .= "<div align="."center"."> <h2>"." Record Not Found..."."</h2></div>";
			}
				
				
			$result.=$result12;
			$result.=$result1;
			echo $result;
		}
	?>
</body>
</html>
