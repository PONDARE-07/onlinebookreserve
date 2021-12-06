<?php
	include 'conFunc.php';
?>
<!DOCTYPE html>
<html lang = "en">
<head>

	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Managing Books</title>
	<link rel="stylesheet" href="css\manages.css"/>
	
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>	
	
</head>
<body>

	<div class="container" style="background-color: #ebeef7;" >
	<h1>Book Manager</h1>
		<form method="post" action="books.php">
			
			<div class="form-group width">
				<label>Book Title</label>
				<input type="text" class="form-control" placeholder="Put Book Title" name="booktitle">
			</div>
			<div class="form-group width">
				<label>Book Author</label>
				<input type="text" class="form-control" placeholder="Author Name" name="bookauthor">
			</div>
			<div class="form-group width">
				<label>Book Published</label>
				Date : 
		            Month : 
		            <select name = "month">
		            	<option>Jan</option>
		            	<option>Feb</option>
		            	<option>Mar</option>
		            	<option>Apr</option>
		            	<option>May</option>
		            	<option>Jun</option>
		            	<option>Jul</option>
		            	<option>Aug</option>
		            	<option>Sep</option>
		            	<option>Oct</option>
		            	<option>Nov</option>
		            	<option>Dec</option>      
		            </select>

		            Day : 
		            <select name = "day">
		            	<?php
		            		for($a = 1; $a <= 31; $a++){
		            			echo "<option> $a </option>";
		            		}
		            	?>
		            </select>

		            Year :
		            <select name = "year">
		            	<?php
		            		for($b = 1900; $b <= 2021; $b++){
		            			echo "<option> $b </option>";
		            		}
		            	?>
		            </select>			
		        </div>

		        <div class = "form-group">
									<label>Quantity:</label>
									<input type = "number" min = "0" name = "qty" required = "required" class = "form-control" />
								</div>
			
			<div class="button">
			<input type="submit" name="submit" value="Add Book">
			
			</div>
		</form>
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
			<th>No</th>
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
						<a href = "delete.php?del_id=<?php echo $row['No']; ?>" > Delete </a> | 
						<a href = "edit.php?id=<?php echo $row['No']; ?>"> Edit </a> 
					</td>
				</tr>
				<?php $n++;
			} ?>
</table>
<a href = "dashboard.php">DashBoard</a>
</body>
</html>