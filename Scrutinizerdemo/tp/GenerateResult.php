<!DOCTYPE html>
<html>
<?php

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
if (!mysqli_query($con,$sql)) {
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
    <title>The Scrutinizer</title>
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
 <div class="navbar navbar-inverse navbar-fixed-top move-me" id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><img class="logo-custom" src="assets/img/img.png" alt="test.html"  /></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="../index.php">HOME</a></li>
                     <li><a href="../index.php#about">ABOUT</a></li>
					 <li><a href="../index.php#contact">CONTACT</a></li>
                     <li><a href="../products.php">PRODUCTS</a></li>
                     <li><a href="mailto:pravesh.jain@somaiya.edu?Subject=Product%20Enquiry" target="_top"> <i class="fa fa-envelope-o"></i><span class="home-mail">e-mail: pravesh.jain@somaiya.edu</span></a></li>
                </ul>
            </div>
           
        </div>
    </div>
<div align ="center">
<br>
<br>
<br>
<br>
<?php

$con=mysqli_connect("localhost","root","","questions");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	//$db = mysqli_select_db("questions", $con);
	
	$sql="SELECT q_id,diff_level,correct,ans_marked
		  FROM test
		  WHere test_id>12 AND correct=ans_marked";
		  
	$result1=mysqli_query($con,$sql);
	while($row1=mysqli_fetch_array($result1))
	{		
		$count=$row1['diff_level']+1;
		$q_id=$row1['q_id'];
		$sj="UPDATE test 
			set marks =$count 
			WHERE $q_id=q_id";
		 //echo $count; 
		 
		 if (!mysqli_query($con,$sj)) {
  die('Error: ' . mysqli_error($con));
}

	}
	$sql="SELECT SUM(marks) as total
		  FROM test";
	$result=mysqli_query($con,$sql);
	$total=mysqli_fetch_assoc($result);
	$sum=$total['total'];
	//echo $sum;
	
	$sql="SELECT SUM(marks) as total
		  FROM test
		  WHERE test_id <=6";
	$result=mysqli_query($con,$sql);
	$total=mysqli_fetch_assoc($result);
	$sum1=$total['total'];
	//echo $sum1;
	
if(isset($_POST["submit"])) 
{
	$science=0;
	$commerce=0;
	$iqscience=0;
	$iqcommerce=0;
	$total=18;
	$sql="SELECT q_id,question,correct,stream,ans_marked,marks,diff_level
		  FROM test";
	$result1=mysqli_query($con,$sql);
	?><fieldset>
	<legend>Result Analysis </legend>
	<div class="container">
				<div class="row">
					<div class="col-lg-2">
						<?php
							echo "Qno.";
						?>
					</div>
					<div class="col-lg-4">
						<?php
						 echo "Question";
						 ?>
						 <br>
					</div>
					<div class="col-lg-3">
						<?php
						 echo "Correct Answer";
						 ?>
						 <br>
					</div>
					<div class="col-lg-3">
						<?php
						echo "Answer Marked";
						 ?>
						 <br>
					</div>
				</div>
			</div>
	
	<?php
	$x=1;
	while($row1=mysqli_fetch_array($result1))
	{
		$q_id=$row1['q_id'];
		$question=$row1['question'];
		$correct=$row1['correct'];
		$stream=$row1['stream'];
		$ans_marked=$row1['ans_marked'];
		$marks=$row1['marks'];
		$diff_level=$row1['diff_level'];
		$sj1="INSERT INTO result(q_id,question,correct,stream,ans_marked,marks,diff_level)
				VALUES ('$q_id','$question','$correct','$stream','$ans_marked','$marks','$diff_level')";

		if (!mysqli_query($con,$sj1)) 
		{
			die('Error: ' . mysqli_error($con));
		}
		if($marks==0)
		{
			?>
			<br>
			<br>
			
			<div class="container">
				<div class="row">
					<div class="col-lg-2">
						<?php
							echo $x;
						?>
					</div>
					<div class="col-lg-4">
						<?php
						 echo $question;
						 ?>
					</div>
					<div class="col-lg-3">
						<?php
						 echo $correct;
						 ?>
					</div>
					<div class="col-lg-3">
						<?php
						 echo $ans_marked;
						 ?>
					</div>	
				</div>
			</div>
			<legend> </legend>
			</fieldset>
		
	<?php
}
mysqli_close($con);	
?>
<form method="post" action="../graph/graph.html">
<input type="submit" name ="submit" value="Generate Result">
</form>
</div>

</html>