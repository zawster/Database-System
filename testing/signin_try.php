<?php 
			include "connect.php";

			if (isset($_POST['txtroll'])){
				$rollnumber = $_POST["txtroll"];
				
				$rollnumber = $_POST['txtroll'];
				$pass = $_POST['txtpass'];
				$qury="Select rollnumber from users Where rollnumber = '".$rollnumber."' and password = '".$pass."'";
				
				
				if ($res = $con->query($qury)){
					$row=$res->fetch_assoc();
					if($row['rollnumber']==$rollnumber) {
						session_start();
						$_SESSION['roll']=$rollnumber;
						header("Location:home.php");
					}
					else{
						$msg = "Invalid User!121";
						header("Location:signin.php?msg=$msg");
					}
				}
				else{
					$msg = "Invalid User!";
					header("Location:signin.php?msg=$msg");
				}
			}
			
		 ?>