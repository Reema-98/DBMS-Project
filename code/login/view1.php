<html style="background-image: url(i1.jpeg);">
	<head>
	<link rel="stylesheet" href="style.css">
	<style>
	tbody tr {
background: url(1.jpg);

}
	</style>

	</head>
<body>


 <?php
$servername = "localhost";
$username = "b160229cs";
$password = "b160229cs";
$dbname = "db_b160229cs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username,fundraisername,fdescription,famount,fdeadline FROM Fundraiser where famount>0 AND verified='yes'";

/*if ($conn->query($sql) == TRUE) {
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} */


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Publisher Username</th><th>Fundraiser Name</th><th>Description</th><th>Amount Required</th><th>Deadline</th></tr>";
   
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"]."</td><td>".$row["fundraisername"]."</td><td>".$row["fdescription"]."</td><td> ".$row["famount"]."</td><td>".$row["fdeadline"]. "</td></tr>";
    }
    echo "</table>";
} else {
     echo "<script type='text/javascript'> alert('No ongoing Fundraisers!'); </script>";
  echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}


$conn->close();
?> 

</body>
</html> 
