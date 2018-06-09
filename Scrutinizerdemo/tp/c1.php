<?php

$s=0;
if(isset($_POST['tuname']))
{
	$tuname=$_POST['tuname'];
	$tpwd=$_POST['tpwd'];
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="select *  from tadmin where tuname='".$tuname."' and tpwd='".$tpwd."'";
	
			  
		$result1=mysqli_query($con,$sql);
		if($row1=mysqli_fetch_array($result1))
		{		
			$s=1;
			//echo "welcome";
			session_start();
			$_SESSION["tid"]=$row1['tid'];
			echo "<frameset cols='20%,*'><frame src=tadminmenu.php name=tadmin_left><frame src=blank.php name=tadmin_right></frameset>";
			
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


<form id="form1" name="form1" method="post" action=tadminlogin.php>
<font size=5 color="black">
  <p>Login:
  <input type="text" name="tuname" id="tuname" required>
  </p>
  <p>
    <label for="tpwd">Password:</label>
    <input type="password" name="tpwd" id="tpwd" required>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit">
  </p>
</form>
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
}
?>