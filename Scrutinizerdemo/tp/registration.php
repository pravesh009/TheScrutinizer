<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="questions";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully"."<br>";
$lname = $_POST['lname'];
$fname = $_POST['fname'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$password = $_POST['password'];
$query = "INSERT INTO users(fname,lname,email,phone_no,password)VALUES('$fname','$lname','$email','$phone_no','$password')";
if($conn->query($query))
{
        $url = "l.html";      
        header ('Location:'.$url); ;
}
else{
echo "<script>alert('Registration failed due to server reasons.');</script>";
}
$conn->close();
?>
