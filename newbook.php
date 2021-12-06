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
		</tr>
	</thead>
	<?php
	$no = 1;
	while($row = mysqli_fetch_array($result)){
		$id = $row['no'];
		$b_title = $row['Book Title'];
		$b_pass = $row['Book Password'];
		$d_pub = $row['Date Published'];
		$qnty = $row['Quantity'];

		echo "<tr>
			   <td>$id</td>
			   <td>$b_title</td>
			   <td>$b_pass</td>
			   <td>$d_pub</td>
			   <td>$qnty/td>
			   <td>
			   
			   </td>		
		     </tr>";
		$no++;
	}
    ?>
</table>
