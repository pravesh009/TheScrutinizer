<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "questions";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$pword = $_POST['password'];
$sql = "SELECT password FROM users WHERE email='$email';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$x = $row["password"];

if( $x == $pword)
{
	   session_start();  
        $_SESSION['user_id'] = $email;   
        $_SESSION['user_password'] = $pword;  
        $url = "index2.html";      
        header ('Location:'.$url);      
}
else {
	
    echo "<script>alert('Your Login Name or Password is invalid.');</script>";
      }
	  


mysqli_close($conn);
?>