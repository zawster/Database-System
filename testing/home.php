<?php 
	include "connect.php";
	session_start();
 ?>
<html>
<head>
	<title>Home Page</title>
</head>
<style>
	img {
		width: 200px;
		height: 200px;
		padding: 15px; 
  		border: 3px solid #000000;
  		border-radius: 6px;  
  		margin-right:7px;
		margin-left:7px;
	    
  		 
	}
</style>
<body>
	<h2 align="center">Welcome to Home Page</h2><hr>
	<div align="center">
		<form action="upload_try.php" method="POST" enctype="multipart/form-data">
			<h3 align="center">
				<?php
					if (isset($_GET["msg"]))
					{
						echo $_GET["msg"];
						unset($_GET["msg"]);
					}
				?>
			</h3>
			<table>
				<tr>
					<td>
						Please select an image
					</td>
				</tr>
				<tr>
					<td>
						<br><input type="file" name="txtfile" required>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="submit" value="Upload">
					</td>
				</tr>
			</table>
		</form>
		<?php 
			$roll=$_SESSION['roll'];

			///////////////////////////////////
			$qry2="SELECT * FROM gallaries WHERE roll='".$roll."'";
			
			if($res=$con->query($qry2)){
			//if ($res1->num_rows>0){

				while ($row = $res->fetch_assoc()){
					$MyPhoto="uploads/".$row['imageID'];
					echo "<img src='".$MyPhoto."'>";
				}
			}
			else{
				echo "No Pictures Available!";
			}
		?>
	</div>
</body>
</html>