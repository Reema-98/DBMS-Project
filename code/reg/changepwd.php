<?php session_start();
?>
<html>
<body>


 <?php
$servername = "localhost";
$username = "b160229cs";
$password = "b160229cs";
$dbname = "db_b160229cs";


$un=$_SESSION['login'];
$op1=$_POST["oldp"];
$np1=$_POST["newp"];
$op=md5($op1);
$np=md5($np1);



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$s1="SELECT * From Details WHERE username ='$un' AND password='$op'";
$s2="SELECT * From Orgs WHERE username ='$un' AND password='$op'";
$r1=$conn->query($s1);
$r2=$conn->query($s2);
if($r1->num_rows >0)
{
	
$a1="UPDATE Details SET password ='$np' WHERE username ='$un' AND password='$op'";
$b1=$conn->query($a1);
$conn->close();
echo "<script type='text/javascript'>alert('Password changed successfully!');</script>";
 echo "<script type='text/javascript'> window.location.href='../login/loggedin2.php';</script>";
}
elseif($r2->num_rows >0)
{
	
$a2="UPDATE Orgs SET password ='$np' WHERE username ='$un' AND password='$op'";
$b1=$conn->query($a2);
$conn->close();
echo "<script type='text/javascript'>alert('Password changed successfully!');</script>";
 echo "<script type='text/javascript'> window.location.href='../login/loggedin2.php';</script>";
}





else {
	
	$conn->close();
    echo "<script type='text/javascript'>alert('Unsuccessful!check if your old password is right!');</script>";
 echo "<script type='text/javascript'> window.location.href='change.html';</script>";
}




?> 

</body>
</html> 
