<?php

$s=0;
if(isset($_POST['cuname']))
{
	$cuname=$_POST['cuname'];
	$cpwd=$_POST['cpwd'];
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="select *  from cadmin where cuname='".$cuname."' and cpwd='".$cpwd."'";
			  
		$result1=mysqli_query($con,$sql);
		if($row1=mysqli_fetch_array($result1))
		{		
			$s=1;
			//echo "welcome";
			session_start();
			$_SESSION["cuname"]=$row1['cuname'];
			echo "<frameset cols='20%,*'><frame src=cadminmenu.php name=cadmin_left><frame src=blank.php name=cadmin_right></frameset>";
			
		}
		else
		{
			echo "inavlid";	
		}
		mysqli_close($con);
	
}
if($s==0)
{
?>
<html>
<title>Membership Form</title>
<style>
body
{
background-color:white;
}
div
{
width:525px;
height:300px;
margin:auto;
margin-top:100px;
border:1px solid black;
background-color:white;
}

.logo{
margin-top:100px;
margin-left:500px
}

input[type=text], select {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 65%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 80%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 10px;
    cursor: pointer;
	margin-left:20px;
}

input[type=submit]:hover {
    background-color: #45a049;
	  
}
form
{
margin-left:45px;

}
</style>
<body>
<div>

<form id="form1" name="form1" method="post" action=cadminlogin.php>
<font size=5 color="black">
  <p>
  <label for="cuname">Login:</label>
  <input type="text" name="cuname" id="uname" required>
  </p>
  <p>
    <label for="pwd">Password:</label>
    <input type="password" name="cpwd" id="pwd" required>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
</div>

</html>
<?php
}
?>