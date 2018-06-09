<?php

$con=mysql_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	$db = mysql_select_db("questions", $con);

if(isset($_POST['submit'])) 
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$usr=$_POST['username'];
		$pwd=$_POST['password'];
		echo $usr;
		$sql="Select * from login where username='$usr' and password='$pwd'";
		if (!mysql_query($sql)) 
		{
			die('Error: ' . mysql_error($con));
		}
		else 
			header('Location: google.html');
	}
}
?>