<html>
<head>
	<title>SignIN From</title>
</head>
<body>
	<h2 align="center">Sign In Form</h2>
		<hr>
		<h3 align="center">
		<?php
			if (isset($_GET["msg"]))
			{
				echo $_GET["msg"];
				unset($_GET["msg"]);
			}
		?>
		</h3>
		
		<form action = "signin_try.php"  method = "POST">
			<table align="center">
				<tr>
					<td>
						Roll Number
					</td>
					<td>
						<input type="text" name="txtroll" required>
					</td>
				</tr>
				<tr>
					<td>
						Password
					</td>
					<td>
						<input type="text" name="txtpass" required>
					</td>

				</tr>
				<tr>
					<td colspan="2" align="right">
						<input type="submit" value="Sign In">
					</td>
				</tr>
			</table>
		</form>
		
</body>
</html>