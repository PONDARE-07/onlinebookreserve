<?php
	include 'conFunc.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Create Account</title>
	<link rel="stylesheet" href="css\community.css"/>

	 <link rel="stylesheet" href="css\signin.css">
	 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
	

</head>
<body>

  <div class="container">
    <div class="title">Create Account</div>
    <div class="content">
	
      <form method="post" action = "signinsert.php"> 
			<div class="txt_registration">
					<i ></i>
					<input type="text" name="username" required>
					<span></span>
					<label >Username</label>
					
			</div>
			
			<div class="txt_registration">
					<input type="password" name="password" required>
					<span></span>
					<label> Password</label>
			</div>
		
          <input type="submit" name="submit" value = "Submit">
		  
      </form>
	  
    </div>
	
  </div>

</body>
</html>
