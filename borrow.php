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
$id=$_GET['del_id'];
  $query = "select * from tblbooks";
  $result = mysqli_query($link, $query);

        $qty = $value;
        $id = $_POST['No'];
        $conn->query("INSERT INTO `borrowing` VALUES('', '$BookTitle', '$BookAuthor', '$DateBorrowed', '$Quantity')") or die(mysqli_error());
        
         
            alert("Successfully Borrowed");
            header("location:manage.php");
        
  