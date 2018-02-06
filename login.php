<?php
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "mydb");
	
	if(isset($_POST['log_in'])) {
		
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['pass']);
		
		$pass = md5($pass);
		
		$sql = "SELECT * FROM signup WHERE email='$email' AND password='$pass'";
		$result = mysqli_query($db, $sql);
		
		if(mysqli_num_rows($result) == 1) {
			header("location: logged.php");
		}
		else {
			echo "<h4>Log in failed! Try again</h4>";
		}
	}
?>

<!DCOTYPE html>
<html>
	<head>
		<title>Log In</title>
		<style>
		
			
			body {
				background-color: #203268;
			}
			
			.left {
				float: left;
			}
			
			.right {
				margin-left: 160px;
				overflow: auto;
			}
			
			#chk {
				margin-left: 10px;
				margin-top: 30px;
				
			}
			
			#submit {
				margin-left: 150px;
				margin-top: 25px;
			}
			
			#form {
				margin-left: 500px;
				margin-top: 75px;
				border: 1px solid white;
				margin-right: 450px;
				padding: 40px 0px 30px 30px;
				color: white;
			}
			
			#cpass {
				margin-top: 13px;
			}
			
			#pass {
				margin-top: 5px;
			}
			
			h4 {
				color: red;
				text-align: center;
			}
			
		</style>
		
		
		<script>
			function validateForm() {
								
				var x = document.forms["login"]["email"].value;
				if(x == "") {
					alert("You must enter your email to login");
					return false;
				}
				
				var y = document.forms["login"]["pass"].value;
				if(y == "") {
					alert("You must enter your password to log in");
					return false;
				}
				
			}
		</script>
	</head>
	
	<body>
		<div id="form">
			<form name="login" method="post" action="login.php" onsubmit="return validateForm()">
				<div class="left">
					Email<br><br>			
					Password<br><br>	
				</div>
				
				<div class="right">
					<input type="email" name="email" id="mail"><br><br>
					<input type="password" name="pass" id="pass"><br><br>
				</div>
				
				
				
				<div id="submit">
					<input type="submit" name="log_in" value="Log In">
				</div>
			</form>
		</div>

		
		
	</body>

</html>