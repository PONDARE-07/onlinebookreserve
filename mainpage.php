<?php 
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang = "en">
<head>

	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>

	<link rel="stylesheet" href="users.css"/>
	
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>	
	
</head>
<body><div><h1><?php  
echo $_SESSION['username'];
?></h1>	
</div><div><h1>
<a href="logout.php">Log out</a></h1>	
</div>
	<h2>Available Books</h2>

	<?php
	$servername = "localhost";
	$username = "root";     //server username
	$password = "";          //server password 
	$dbname = "prjctable";  //database name

	$link = mysqli_connect($servername, $username, $password, $dbname);
			if (!$link) {
  				die("Connection failed: " . mysqli_connect_error());
			}
			/*else{
				echo "Connection Success";
			}*/



	$query = "select * from tblbooks";
	$result = mysqli_query($link, $query);
?>

<p>
<table class="table">
	<thead>
		<tr>
			<th>No.</th>
			<th>Book Title</th>
			<th>Book Author</th>
			<th>Date Published</th>
			<th>Quantity</th>
			<th>Action</th>
		</tr>
	</thead>
	<?php
			$query = "select * from tblbooks";
			$result = mysqli_query($link, $query);

			// if (mysqli_query($link, $query)) {
			//   echo "New record created successfully";
			// } else {
			//   echo "Error: " . $query . "<br>" . mysqli_error($link);
			// }
			$n = 1; //numbering "counting"
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				
				echo "<td>" . $row['No'] . "</td>";
				$id = $row['No'];
				echo "<td>" . $row['BookTitle'] . "</td>";
				echo "<td>" . $row['BookAuthor'] . "</td>";
				echo "<td>" . $row['DatePublished'] . "</td>";
				echo "<td>" . $row['Quantity'] . "</td>";
				echo "<td> "?>
						<a href = "mainpage.php?id=<?php echo $row['No']; ?>&del=delete" > Borrow Book </a> 	
					</td>
				</tr>
				<?php $n++;
			} ?>
</table>
<h2>Borrowed Books</h2>
<table class="table">
	<thead>
		<tr>
			<th>TransactionID</th>
			<th>Book Title</th>
			<th>Book Author</th>
			<th>Date Borrowed</th>
			<th>Date Returned</th>
			<th>Action</th>
		</tr>

	</thead>
<br>
<br>
	<?php
			$query = "SELECT * FROM `booktransactions`,users,tblbooks WHERE users.user_id=booktransactions.UserID AND tblbooks.No=booktransactions.BID";
			$result = mysqli_query($link, $query);

			// if (mysqli_query($link, $query)) {
			//   echo "New record created successfully";
			// } else {
			//   echo "Error: " . $query . "<br>" . mysqli_error($link);
			// }
			$n = 1; //numbering "counting"
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				
				echo "<td>" . $row['TransactionID'] . "</td>";
				$id = $row['No'];
				echo "<td>" . $row['BookTitle'] . "</td>";
				echo "<td>" . $row['BookAuthor'] . "</td>";
				echo "<td>" . $row['DateBorrowed'] . "</td>";
				echo "<td>" . $row['DateReturned'] . "</td>";
				echo "<td> "?><?php if($row['DateReturned']=="0000-00-00"
){?><button>
						<a href = "mainpage.php?ids=<?php echo $row['TransactionID']; ?>&id=<?php echo $row['BID']; ?>&dels=delete" > Return Book </a> 	
					</button>
<?php }else{ ?>
<button disabled="">Already returned</button>
<?php } ?>
				</td>
				</tr>
				<?php $n++;
			} 

if(isset($_GET['del'])){
			 $sqls=mysqli_query($link,"SELECT user_id FROM users where username ='".$_SESSION['username']."'");
$id=0;
while($row=mysqli_fetch_array($sqls)){
$id=$row['user_id'];
}			
			$TransactionID=rand(100000,999999);
			$_SESSION['username'];
			$ids=$_GET['id'];
			$sq="INSERT INTO `booktransactions`(TransactionID,`BID`, `UserID`, `DateBorrowed`) VALUES ($TransactionID,$ids,$id,'".date("Y-m-d")."')";
			$qy=mysqli_query($link,$sq);
			$qy=mysqli_query($link,"UPDATE `tblbooks` SET `Quantity`=(SELECT `Quantity` FROM `tblbooks` WHERE No=$ids)-1 WHERE No=$ids");
			if($qy){

			echo '<script>alert("successfully Borrowed book")</script>';
			}	
      		}

if(isset($_GET['dels'])){		
			
			$ids=$_GET['ids'];
			$bid=$_GET['id'];
			$qys=mysqli_query($link,"UPDATE `tblbooks` SET `Quantity`=(SELECT `Quantity` FROM `tblbooks` WHERE No=$id)+1 WHERE No=$id");
			$qyss=mysqli_query($link,"UPDATE `booktransactions` SET DateReturned='".date("Y-m-d")."' WHERE TransactionID=$ids");
			if($qyss){

			echo '<script>alert("successfully Returned book")</script>';
			}	
      		}
			?>
	
<body>
</html>