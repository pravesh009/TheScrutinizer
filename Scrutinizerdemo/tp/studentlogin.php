<?php

$s=0;
if(isset($_POST['uname']))
{
	$uname=$_POST['uname'];
	$upwd=$_POST['upwd'];
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="select *  from user where uname='".$uname."' and upwd='".$upwd."'";
	
			  
		$result1=mysqli_query($con,$sql);
		if($row1=mysqli_fetch_array($result1))
		{		
			$s=1;
			//echo "welcome";
			session_start();
			$_SESSION["uname"]=$row1['uname'];
			echo "<frameset cols='20%,*'><frame src=studentmenu.php name=student_left><frame src=blank.php name=student_right></frameset>";
			//$url = "test3.php";   
		
      //header ('Location:'.$url);
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
<title>Login Form</title>
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


<form id="form1" name="form1" method="post" action=studentlogin.php>
<font size=5 color="black">
  <p>Login:
  <input type="text" name="uname" id="uname" required>
  </p>
  <p>
    <label for="upwd">Password:</label>
    <input type="password" name="upwd" id="upwd" required>
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