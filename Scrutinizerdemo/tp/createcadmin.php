<?php

if(isset($_POST['cuname']))
{
	$coname=$_POST['coname'];
	$cname=$_POST['cname'];
	$cuname=$_POST['cuname'];
	$cpwd=$_POST['cpwd'];
	$tel=$_POST['tel'];
	$caddress=$_POST['caddress'];
	$cemail=$_POST['cemail'];
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="insert into cadmin values ('".$coname."','".$cname."','".$cuname."','".$cpwd."','".$tel."','".$caddress."','".$cemail."')";
			  
		mysqli_query($con,$sql);
			
			echo "C-admin created successfully";
	
		mysqli_close($con);
	
}


?>
<form id="form1" name="form1" method="post" action ='createcadmin.php'> 
  <p>
    <label for="textfield4">Institute/Company Name:</label>
    <input type="text" name="coname" id="textfield4">
  </p>
  <p>
    <label for="textfield">Person Name:</label>
    <input type="text" name="cname" id="textfield">
  </p>
  <p>
    <label for="email">Email:</label>
  <input type="email" name="cemail" id="email">
  </p>
  <p>
    <label for="textfield2">Username:</label>
    <input type="text" name="cuname" id="textfield2">
  </p>
  <p>
    <label for="password">Password:</label>
    <input type="password" name="cpwd" id="password">
  </p>
  <p>
    <label for="tel">Mobile/Tel:</label>
    <input type="tel" name="tel" id="tel">
  </p>
  <p>
    <label for="textarea">Address:</label>
    <textarea name="caddress" id="textarea"></textarea>
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="Create">
  </p>
</form>
</body>
</html>