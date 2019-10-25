
<html>
<body>


 <?php
$servername = "localhost";
$username = "b160229cs";
$password = "b160229cs";
$dbname = "db_b160229cs";

$pn=$_POST["mobile"];
$un=$_POST["username"];
$pw1=$_POST["password"];
$nm=$_POST["name"];
$des=$_POST["des"];
$mail=$_POST["email"];
$bn=$_POST["bname"];
$street=$_POST["street"];
$city=$_POST["city"];
$pin=$_POST["pin"];
$state=$_POST["state"];
$address=$bn.' '.$street.' '.$city.' '.$pin.' '.$state;
$pw=md5($pw1);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql1="SELECT username from Details where username='$un'";
$result1= $conn->query($sql1);
$sql2="SELECT username from Orgs where username='$un'";
$result2= $conn->query($sql2);
$r1=$result1->num_rows;
$r2=$result2->num_rows;
$sum=$r1+$r2;
if ($sum == 0) {


$sql = "INSERT INTO Orgs (username,password,ONAME, ODESCRIPTION, OEMAIL,OADDRESS,OPHONE)
VALUES ('$un','$pw','$nm','$des','$mail','$address','$pn')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 header("Location:login.html"); 
				 exit;
 
}

else
{

$conn->close();
echo "<script type='text/javascript'>alert('Username already exists!');</script>";
 echo "<script type='text/javascript'> window.location.href='signup.html';</script>";
}


?> 

</body>
</html> 
