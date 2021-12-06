<?php
	include 'conFunc.php';
?>
<?php
	$username = $_POST['username'];
	$password = $_POST['password'];

$sql = "insert into users(username, password) 
		values('$username', '$password')";


if (mysqli_query($link, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

?>