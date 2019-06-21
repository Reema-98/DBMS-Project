<?php session_start(); ?>
<html style="background-image:url(i3.jpg);"><head><title>Blood Donation</title>
<link rel="stylesheet" href="style.css">
	<style>
	tbody tr {
background: url(3.png);

}
	</style>

</head>
<body>


 <?php
$servername = "localhost";
$username = "b160229cs";
$password = "b160229cs";
$dbname = "db_b160229cs";


$uname=$_SESSION['login'];
$dsn=$_POST["description"];
$bgp=$_POST["blood"];
$d=$_POST["ddate"];
$qty=$_POST["qty"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="SELECT description from bloodrequests where description='$dsn'";
$result1= $conn->query($sql1);
if($result1->num_rows ==0)
{

$sql = "INSERT INTO bloodrequests (username,description,blood_group,deadline,quantity)
VALUES ('$uname','$dsn','$bgp','$d','$qty')";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
    
    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$sql = "SELECT NAME,EMAIL,PHONE,ADDRESS,BLOODGROUP from Details where BLOODGROUP='$bgp' and q1='yes'" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th> <th>Blood Group</th></tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["NAME"]."</td><td>".$row["EMAIL"]."</td><td> ".$row["PHONE"]."</td><td>".$row["ADDRESS"]. "</td><td>".$row["BLOODGROUP"]."</td></tr>";
    }
    echo "</table>";
} else {
    
    echo "<script type='text/javascript'> alert('Your Request has been registered but there are no matching registered blood donors!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}

$conn->close();
}

else
{
	

$conn->close();
  echo "<script type='text/javascript'> alert('This Blood Request was already registered!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";


}

?> 

</body>
</html> 
