
<?php
session_start();
if(isset($_POST['tuname']))
{
	
	$cadmin=$_SESSION['cuname'];
	$tid=$_POST['tid'];
	$tname=$_POST['tname'];
	$tuname=$_POST['tuname'];
	$temail=$_POST['temail'];
	$tpwd=$_POST['tpwd'];
	$ttel=$_POST['ttel'];
	
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="insert into tadmin values ('".$tid."','".$cadmin."','".$tname."','".$tuname."','".$temail."','".$tpwd."','".$ttel."','A')";
			  
		mysqli_query($con,$sql);
			
			echo "T-admin created successfully";
	
		mysqli_close($con);
	
}


?>

<form id="form1" name="form1" method="post" action ='create_Tadmin.php'> 
<p>
  <label for="textfield">Name:</label>
  <input type="text" name="tname" id="textfield">
</p>
<p>
  <label for="textfield3">Teacher ID:</label>
  <input type="text" name="tid" id="textfield3">
</p>
<p>
  <label for="textfield2">Username:</label>
  <input type="text" name="tuname" id="textfield2">
</p>
<p>
  <label for="email">Email:</label>
  <input type="email" name="temail" id="email">
</p>
<p>
  <label for="password">Password:</label>
  <input type="password" name="tpwd" id="password">
</p>
<p>
  <label for="tel">Mobile/Tel:</label>
  <input type="tel" name="ttel" id="tel">
</p>
<p>
  <input type="submit" name="submit" id="submit" value="Create">
</p>
</form>