<?php
	include 'conFunc.php';
?>
<?php
	$booktitle = $_POST['booktitle'];
	$b_author = $_POST['bookauthor'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	$Date = "$month-$day-$year";

	$qty = $_POST['qty'];


$sql = " INSERT INTO `tblbooks` ( `BookTitle`, `BookAuthor`, `DatePublished`, `Quantity`)
VALUES('$booktitle', '$b_author', '$Date', '$qty')";


if (mysqli_query($link, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

?>