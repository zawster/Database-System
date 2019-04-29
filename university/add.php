<html>
<head>
	<title>Cource Add</title>
</head>

<body>
<form action="add_try.php" method="post">
		<table align="center">
			<th colspan="2">Cources Registeration</th>
			<tr>
				<td>
					Cource ID
				</td>
				<td>
					<input type="text" name="txtid" required>
				</td>
			</tr>
			<tr>
				<td>
					Cource Name
				</td>
				<td>
					<input type="text" name="txtName" required>
				</td>
			</tr>
			<tr>
				<td>
					Credits/hour
				</td>
				<td>
					<select name="credits" required>
						<option value="3">3</option>
						<option value="1">1</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="right">
					<input type="submit" value="Add Cource">
				</td>
				
			</tr>
			
			<tr>
				<td colspan="2">
					<?php
						if (isset($_GET["msg"])) {
							echo $_GET["msg"];
							unset($_GET["msg"]);
						}
					?>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
