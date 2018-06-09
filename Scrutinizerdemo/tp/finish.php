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
                <a class="navbar-brand" href="#"><img class="logo-custom" src="assets/img/img.png" alt="test.html"  /></a>
            </div>
            <div class="navbar-collapse collapse">
			
     				<ul class="nav navbar-nav navbar-right">
                    <li ><a href="#home">HOME</a></li>
                     <li><a href="#features">TEST</a></li>	
					 <li><a href="">PROFILE</a></li>
					 <li><a href="#developers">ABOUT US</a></li>
                     <li><a href="#contact">CONTACT</a></li>
					 <li><a href="thanku.html">LOGOUT</a></li>
                     <li><a href="mailto:pravesh.jain@somaiya.edu?Subject=Product%20Enquiry" target="_top"> <i class="fa fa-envelope-o"></i><span class="home-mail">e-mail: pravesh.jain@somaiya.edu</span></a></li>
                
                </ul>
            </div>
           
        </div>
    </div>
  <section class="header-sec" id="home" >
           <div class="overlay">
 <div class="container">
           <div class="row text-center" >
           
               <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
               
                <h2 data-scroll-reveal="enter from the bottom after 0.1s">
                    <strong>
                   You have Successfully submitted the test
                        </strong>
                        </h2>
						
						<form method="post" action="../graph/graph.html">
						<div align="center">
			<input type="submit" name="submit" value="View Result">
			</form>
		</div>
                                   
                 
                     
                  <br />
                   
     
              
              
            </div>
                
               </div>
                </div>
           </div>
           
       </section>

</body>
		
</html>