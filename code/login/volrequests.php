 <?php
 session_start();
 ?>
<html>
<body>


 <?php
$servername = "localhost";
$username = "b160229cs";
$password = "b160229cs";
$dbname = "db_b160229cs";


$uname=$_SESSION['login'];
$cn=$_POST["cname"];
$no=$_POST["cno"];
$desn=$_POST["cdescription"];
$dd=$_POST["cddate"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="SELECT cname from Campaigns where cname='$cn'";
$result1= $conn->query($sql1);
if($result1->num_rows ==0)
{


$sql = "INSERT INTO Campaigns (username,cname,cdescription,number,cdeadline)
VALUES ('$uname','$cn','$desn','$no','$dd')";

if ($conn->query($sql) === TRUE) {
$conn->close();
      echo "<script type='text/javascript'> alert('Successfully registered Social Campaign Request!'); </script> ";
      echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
   
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else
{
	

$conn->close();
  echo "<script type='text/javascript'> alert('The same Social Campaign Request was already registered!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";


}
?> 

</body>
</html> 
