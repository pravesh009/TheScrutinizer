
<?php

if(isset($_POST['subname']))
{
	$subid=$_POST['subid'];
	$subname=$_POST['subname'];	
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="insert into subject values ('".$subid."','".$subname."','A')";
			  
		mysqli_query($con,$sql);
			
			echo "Subject created successfully";
	
		mysqli_close($con);
	
}


?>

<form id="form1" name="form1" method="post" action ='create_subject.php'> 
<p>
  <label for="textfield">Subject ID:</label>
  <input type="text" name="subid" id="textfield2">
</p>
<p>
  <label for="textfield2">Subject Name:</label>
  <input type="text" name="subname" id="textfield2">
</p>
<p>
  <input type="submit" name="submit" id="submit" value="Submit">
</p>
<p>&nbsp;</p>
</form>