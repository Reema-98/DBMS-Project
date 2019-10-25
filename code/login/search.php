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


$bgp=$_POST["bloodgp"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT username,description,blood_group,deadline,quantity FROM bloodrequests where blood_group='$bgp' AND verified='yes'" ;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Username</th><th>Description</th><th>Blood Group</th><th>deadline</th><th>quantity</th></tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["description"]."</td><td> ".$row["blood_group"]."</td><td>".$row["deadline"]. "</td><td>".$row["quantity"]."</td></tr>";
    }
    echo "</table>";
} else {
     echo "<script type='text/javascript'> alert('No matching Blood Group Requests!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}

$conn->close();


?> 

</body>
</html> 
