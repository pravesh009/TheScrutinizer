<html>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>The Scrutinizers</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
	<link rel="icon" href="../tp/assets/img/img.png">
    <link href="../tp/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="tp/assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- STYLE SWITCHER  CSS -->
<link href="../tp/assets/css/styleSwitcher.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="../tp/assets/css/style.css" rel="stylesheet" />  
     <!--GREEN STYLE VERSION IS BY DEFAULT, USE ANY ONE STYLESHEET FROM TWO STYLESHEETS (green or red) HERE-->
     <link href="../tp/assets/css/themes/green.css" id="mainCSS" rel="stylesheet" />   
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>
<body >
 
	<br>
	<br>
	<br>
<head>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/numeric/1.2.6/numeric.min.js"></script>
<body>
  <div align=center><h1>Current Test Analysis</h1>
  <div id="myDiv1" style="width: 680px; height: 400px;"></div>
 
  
  </div>
  <?php
  session_start();
  if(isset($_POST['s'])){
	$testid=$_POST['testid'];
	$uname=$_POST['uname'];
  }
  else{
	$testid=$_GET['testid'];
	$_SESSION['testid']=$testid;
	$uname=$_GET['uname'];  
	$_SESSION['uname']=$uname;
	//echo $testid;
  }
  $con=mysqli_connect("localhost","root","","Scrutinizer");
  $sql1="select * from test where status='C'and studentID='".$uname."' and testID='".$testid."'";
  $result1=mysqli_query($con,$sql1);
  $rows1=mysqli_num_rows($result1);
    $sql2="select * from test where status='W'and studentID='".$uname."' and testID='".$testid."'";
  $result2=mysqli_query($con,$sql2);
  $rows2=mysqli_num_rows($result2);
    $sql3="select * from test where status='N'and studentID='".$uname."' and testID='".$testid."'";
  $result3=mysqli_query($con,$sql3);
  $rows3=mysqli_num_rows($result3);
 // echo $rows;
//  echo"***********";?>

<center><h3><?php echo "Total Score:".$rows1."/10";
?></h3>
</center>
	
 
  <script>
    var x=<?php echo $rows1;?>;
	var y=<?php echo $rows2;?>;
	var z=<?php echo $rows3;?>;
	var data1 = [{
					values: [x,y,z],
					labels: ['Correct-Answer', 'Incorrect-Answer','Not-Attempted'],
					type: 'pie'
					
				}];
	Plotly.newPlot('myDiv1', data1);
  </script>
  
 
 </body>
 </head>
</html>