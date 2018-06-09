<!DOCTYPE html>
<html>
<?php
session_start();
$x=$_GET['sub'];
$y=$_GET['id'];
$z=$_GET['uname']; 
//echo $y;
$_SESSION['subid']=$x;

$con=mysqli_connect("localhost","root","","questions");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	//$db = mysqli_select_db("questions", $con);

if(isset($_POST['submit'])) 
{
	//$counter=$_POST['hiddencounter'];
if(!empty($_POST['option0']))
{
	$option1=$_POST['option0'];
	$option2=$_POST['option1'];
	$option3=$_POST['option2'];
	$option4=$_POST['option3'];
	$option5=$_POST['option4'];
	$option6=$_POST['option5'];
	$array=explode(" ",$option1);
	$sql="UPDATE test SET ans_marked='$array[0]' WHERE q_id='$array[1]'";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
	$array=explode(" ",$option2);
	$sql="UPDATE test SET ans_marked='$array[0]' WHERE q_id='$array[1]'";
if (!mysqli_query($$con,sql)) {
  die('Error: ' . mysqli_error($con));
}
$array=explode(" ",$option3);
	$sql="UPDATE test SET ans_marked='$array[0]' WHERE q_id='$array[1]'";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$array=explode(" ",$option4);
	$sql="UPDATE test SET ans_marked='$array[0]' WHERE q_id='$array[1]'";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$array=explode(" ",$option5);
	$sql="UPDATE test SET ans_marked='$array[0]' WHERE q_id='$array[1]'";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
$array=explode(" ",$option6);
	$sql="UPDATE test SET ans_marked='$array[0]' WHERE q_id='$array[1]'";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
}
}
 
mysqli_close($con);
?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <!-- BOOTSTRAP CORE STYLE CSS -->
	<link rel="icon" href="assets/img/img.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- STYLE SWITCHER  CSS -->
<link href="assets/css/styleSwitcher.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />  
     <!--GREEN STYLE VERSION IS BY DEFAULT, USE ANY ONE STYLESHEET FROM TWO STYLESHEETS (green or red) HERE-->
     <link href="assets/css/themes/green.css" id="mainCSS" rel="stylesheet" />   
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>
<body >
<?php

	$con=mysqli_connect("localhost","root","","Scrutinizer");
					if(isset($_POST['submit'])){
						$sql="select * from testcreated where TestID=".$y."";
						$result=mysqli_query($con,$sql);
						$row = mysqli_fetch_assoc($result);
						if(strcmp($row['testType'],"Adaptable")){
							header("Location:testscreen.php?value=".$row['TestID']."&uname=".$z."");
						}
						else{
							date_default_timezone_set('Asia/Kolkata');
							$t=date('Y-m-d H:i:s');
							$x=date("Y")."_association";
							$sql1="select * from user where uname='".$z."'";
							//echo $sql1;
							$result1=mysqli_query($con,$sql1);
							$row1=mysqli_fetch_assoc($result1);
							$name=$row1['name'];
							//echo $name;
							$sql2="update ".$x." set starttime='".$t."' where TestID='".$y."' and stdname='".$name."'";
							//echo $sql2;
							mysqli_query($con,$sql2);
							header("Location:oldtest.php?value=".$row['TestID']."&uname=".$z."");
						}
					}
?>
 <div class="container">
	<div class="row">
		<div class ="col-lg-8">
			<div align="center">
				<br>
				<br>
				<br>
				<br>
				<h2>Note :</h2>
				<li type="square">No Negative marks.
				<br>
				<br>
				<?php
				echo "<form method=post >";
			
					echo "<h1><input type=submit name =submit value=Start Test></h1>";
				echo "</form>";
				?>
			</div>
		</div>
		<div class="col-lg-4">
			<br>
			<br>
			<br>
			<br>
			<h2>Instruction :</h2>
			<li>Don't Refresh the page while test is on.
			<li>Press Mark as Review if you are not sure about the question.
			<li>Click the 'Submit Test' button given in the bottom of this page to Submit your answers.
			<li>Test will be submitted automatically if the time expired.

		</div>
	</div>
</div>
</html>