<?php
session_start();
if(isset($_POST['uname']))
	
{
	$cadmin=$_SESSION['cuname'];
	$cpname=$_POST['cpname'];
	$name=$_POST['name'];
	$uemail=$_POST['uemail'];
	$uname=$_POST['uname'];
	$upwd=$_POST['upwd'];
	$tel=$_POST['tel'];
	$category=$_POST['category'];
	//$year=$_POST['year'];
	$uaddress=$_POST['uaddress'];
	
	
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="insert into user values ('".$cpname."','".$cadmin."','".$name."','".$uemail."','".$uname."','".$upwd."','".$tel."','".$category."','".$uaddress."')";
			  
		mysqli_query($con,$sql);
			
			echo "User created successfully";
	
		mysqli_close($con);
	
}


?>
<form id="form1" name="form1" method="post" action ='createuser.php'> 
  <p>
    <label for="textfield4">Institute/Company Name:</label>
    <input type="text" name="cpname" id="textfield4">
  </p>
  <p>
    <label for="textfield">Person Name:</label>
    <input type="text" name="name" id="textfield">
  </p>
  <p>
    <label for="email">Email:</label>
  <input type="email" name="uemail" id="email">
  </p>
  <p>
    <label for="textfield2">Username:</label>
    <input type="text" name="uname" id="textfield2">
  </p>
  <p>
    <label for="password">Password:</label>
    <input type="password" name="upwd" id="password">
  </p>
  <p>
    <label for="tel">Mobile/Tel:</label>
    <input type="tel" name="tel" id="tel">
  </p>
  <p>
    <label for="email">Category:</label>
  <input type="text" name="category" id="category">
  </p>
  <p>
    <label for="textarea">Address:</label>
    <textarea name="uaddress" id="textarea"></textarea>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Create">
  </p>
</form>
</body>
</html>