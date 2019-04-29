<html>
<head>
	<title>registration form</title>
<style>a{text-decoration: none;}</style>
</head>
<body>
		<!--form-->
		<h2 align="center">Registration Form</h2>
		<hr>
		<h3 align="center">
		<?php
				if (isset($_GET["msg"]))
					{
						echo $_GET["msg"];
						unset($_GET["msg"]);
					}
			?></h3>
		<form action = "register_try.php"  method = "POST">
			<table align="center">
				<th colspan="2">SIGNUP</th>
		<tr>
			<td>
				roll number
			</td>
			<td>
				<input type="text" name="txtroll" required>
			</td>
		</tr>
		<tr>
			<td>
				name
			</td>
			<td>
				<input type="text" name="txtname" required>
			</td>
		</tr>
		
		<tr>
			<td>
				contact
			</td>
			<td>
				<input type="text" name="txtcontact" required>
			</td>
		</tr>
		<tr>
			<td>
				password
			</td>
			<td>
				<input type="text" name="txtpassword" required>
			</td>
		</tr>
		<tr>
				<td colspan="2" align="right">
					<input type="submit" value="SIGNUP">
				</td>
		</tr>
		<tr>
		<tr>
				<td colspan="2" align="right">
					<a href="signin.php"><input type="button" value="SIGN IN"></a>
				</td>
		</tr>
		
	</table>
	</form>
</body>
</html>