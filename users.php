<?php
session_start();
	include 'conFunc.php';
?>
<!DOCTYPE html>
<html lang = "en">
<head>

	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>
	<h1>User Page</h1>
	<link rel="stylesheet" href="css\users.css"/>
	
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>	
	
</head>
<body>
	
	<div class="container">
	<div style="background-color: #ebeef7" class="center">
			<h1>Login</h1>
			<form method="post"><font color="grey"></font>
				<div class="txt_field">
					<input type="text" name="username" required>
					<span></span>
					<label>Username</label>
				</div>
				
				<div class="txt_field">
					<input type="password" name="password" required>
					<span></span>
					<label>Password</label>
				</div>
				
				 <input type="submit" name="submit" value="Login">
				 <div class="signup_link">
				    Not a member? <a href="signin.php">Sign in</a>
				</div>
			</form>
	
	</div>
	</div>
	
</body >
</html>

<?php
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "SELECT username, password FROM users where username = '$username' and password = '$password'";

  		if ($result = mysqli_query($link,$query))
  		{
  
  			$rowcount = mysqli_num_rows($result);
  			if($rowcount == 1){
  				session_start();
  				$_SESSION['username'] = $_POST['username'];
  				header("location:mainpage.php");

  			}
  			else{
  				header("location:login.php");
  			}
  
  		}

	}
?>