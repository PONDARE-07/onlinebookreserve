
<?php
$servername = "localhost";
$username = "root";     //server username
$password = "";          //server password 
$dbname = "prjctable";  //database name

$link = mysqli_connect($servername, $username, $password, $dbname);
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
$TID=intval($_GET['id']);
$qry = mysqli_query($link,"select * from tblbooks where No=$TID"); // select query


if(isset($_POST['update'])) // when click on Update button
{
    $booktitle = $_POST['booktitle'];
    $bookauthor = $_POST['bookauthor'];
    $Date = $_POST['Date'];
  $qty = $_POST['qty'];
    
    $edit = mysqli_query($link,"update tblbooks set BookTitle='$booktitle', BookAuthor='$bookauthor', DatePublished='$Date', Quantity='$qty' where `tblbooks`.`No`='$TID'");
    
    
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:manage.php"); // redirects to all records page
       exit;
    }
    else
    {
        echo mysqli_error();
    }       
}
?>

<h3>Update Data</h3>
<?php while($data=mysqli_fetch_array($qry)){ 

  ?>

<form method="POST">
  <input type="text" name="booktitle" value="<?php echo $data['BookTitle'] ?>" placeholder="Enter Book Title" Required>
  <input type="text" name="bookauthor" value="<?php echo $data['BookAuthor'] ?>" placeholder="Enter Book Author" Required>
  <input type="text" name="Date" value="<?php echo $data['DatePublished'] ?>" placeholder="Enter Date Published" Required>
  <input type="text" name="qty" value="<?php echo $data['Quantity'] ?>" placeholder="Enter Quantity" Required>
  <input type="submit" name="update" value="Update">
<?php } ?>
</form>