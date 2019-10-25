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
$fn=$_POST["fname2"];
$amt=$_POST["amount"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$a="SELECT famount FROM Fundraiser WHERE fundraisername='$fn'"; 
$result = $conn->query($a);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $a2=$row["famount"];
    }
} 
else {
	$conn->close();
     echo "<script type='text/javascript'>alert('Invalid Fundraiser name!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
}

$a1=$a2-$amt;

$q1="UPDATE Fundraiser SET famount='$a1' WHERE fundraisername='$fn'";

if ($conn->query($q1) === TRUE) {
   
} else {
    echo "Error: " . $q1 . "<br>" . $conn->error;
}


$sq="SELECT username,fundraisername,amt FROM Donations where username='$uname' AND fundraisername='$fn'";
$res=$conn->query($sq);
if($res->num_rows ==0)
{


$sql = "INSERT INTO Donations (username,fundraisername,amt)
VALUES ('$uname','$fn','$amt')";

if ($conn->query($sql) === TRUE) {
	echo "<script type='text/javascript'>alert('Donated successfully!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
  
}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

else
{
	 while($row1 = $res->fetch_assoc()) {
        $amt1=$row1["amt"];
    }
    $amt2=$amt1+$amt;
    $sq2="UPDATE Donations SET amt='$amt2' WHERE fundraisername='$fn' AND username='$uname'";
    $res2=$conn->query($sq2);
    echo "<script type='text/javascript'>alert('Donated successfully!');</script>";
 echo "<script type='text/javascript'> window.location.href='loggedin2.php';</script>";
$conn->close();
}

?> 

</body>
</html> 
