<?php
	
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "mydb");
	
	if(isset($_POST['sign_up'])) {
		
		$uname = mysql_real_escape_string($_POST['fname']);
		$email = mysql_real_escape_string($_POST['email']);
		$pass = mysql_real_escape_string($_POST['pass']);
		$cpass = mysql_real_escape_string($_POST['cpass']);
		
		if($pass==$cpass and $uname != "" and $email != "") {
			//create user
			$pass = md5($pass);
			$sql = "INSERT INTO signup(uname, email, password) VALUES('$uname','$email','$pass')";
			mysqli_query($db, $sql);
			header("location: welcome.php");
		}
		else {
			//fail
			echo "<h4>Try again</h4>";
		}
	}
?>

<!DCOTYPE html>
<html>
	<head>
		<title>Sign Up</title>
		<style>
		
			
			form {
				margin: 100px 0px 0px 500px;
			}
			table {
				border: 1px solid white;
				padding: 50px 20px 50px 20px;
			}
			body {
				background-color: #203268;
				color: white;
			}
			
			h4 {
				color: red;
				text-align: center;
			}
			
		</style>
		
		<script>
			function validateForm() {
				var x = document.forms["myform"]["fname"].value;
				if(x == "") {
					alert("Name must be filled out");
					return false;
				}
				
				var y = document.forms["myform"]["email"].value;
				if(y == "") {
					alert("Email must be filled out");
					return false;
				}
				
				var z = document.forms["myform"]["pass"].value;
				if(z == "") {
					alert("Password must be filled out");
					return false;
				}
				
				var p = document.forms["myform"]["cpass"].value;
				if(p == "") {
					alert("Please enter the password again to confirm");
					return false;
				}
				
				if (z != p) {
					alert("Password not matched!");
				}
				
				else {
					alert("Sign up Successful!");
				}
				
			
			}
		</script>
	</head>
	
	<body>
		<div id="form">
			<form name="myform" method="post" action="signup.php" onsubmit="return validateForm()">
				<table>
				
					<tr>
						<td>Full Name</td>
						<td><input type="text" name="fname" id="fname"><br/><br/></td>
					</tr>
						<td>Email</td>
						<td><input type="email" name="email" id="mail"><br/><br/></td>
					<tr>
						<td>Password</td>
						<td><input type="password" name="pass" id="pass"><br/><br/></td>
					</tr>
					<tr>
						<td>Confirm Password</td>
						<td><input type="password" name="cpass" id="cpass"><br/><br/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="sign_up" value="Sign Up"></td>
					</tr>
					
				</table>
										
			</form>
		</div>

		
		
	</body>

</html>