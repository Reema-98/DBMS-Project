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
$un=$_POST["username"];
$pw1=$_POST["password"];
$pw=md5($pw1);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username,password FROM Details";
$result = $conn->query($sql);
$sql1 = "SELECT username,password FROM Orgs";
$result1 = $conn->query($sql1);
$flag=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if ($row["username"]==$un && $row["password"]==$pw)
             { 
				 $flag=1;
				 $_SESSION['login']=$_POST['username'];
				 
					$conn->close();
				 header("Location:../login/loggedin2.php"); 
				 exit;
				 }
    }
	
}
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
      if ($row["username"]==$un && $row["password"]==$pw)
             { 
				 $flag=1;
				 $_SESSION['login']=$_POST['username'];
				 
					$conn->close();
				 header("Location:../login/loggedin2.php"); 
				 exit;
				 }
    }
	
}
	
	
	
	

if($flag==0)  {
	 
	 $conn->close();
	 echo "<script type='text/javascript'>alert('Invalid Username or Password!..');</script>";
	  echo "<script type='text/javascript'> window.location.href='login.html';</script>";
	 
    
}


?> 

</body>
</html>
