<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Online Exam Portal</title>
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
					<br>
					<h4>Section 1 </h4>    
					<br> 
				</ul>
            </div>
           
        </div>
   </div>
      <!--NAVBAR SECTION END-->
	  <br>
	  <br>
	  <head>
		<link rel="stylesheet" href="FlipClock-master/compiled/flipclock.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script src="FlipClock-master/compiled/flipclock.js"></script>		
	</head>
	<body>
	<div class="element">
		<div class="clock" align ="center" style="margin:2em;"></div>
		<div class="message" align="center" ></div>
	</div>

	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {

			clock = $('.clock').FlipClock(120, {
		        clockFace: 'MinuteCounter',
		        countdown: true,
		        callbacks: {
		        	stop: function() {
		        		window.alert("Time is up. Press OK to continue.");
						window.location = "test2.php"
		        	}
		        }
		    });

		});
		
	</script>
	
	</body>

<br>
</div>
</head>
	  <form action="test2.php">
	  
<?php

$con=mysql_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	$db = mysql_select_db("questions", $con);

if(isset($_POST['submit'])) 
{
if(!empty($_POST['option']))
{
$counter=$_POST['hiddencounter'];
$option[] = $_POST['option'];
for($x=0;$x<$counter;$x++)
{
$array=explode(" ",$option[$x]);
$sql="UPDATE test SET ans_marked='$array[0]' WHERE q_id='$array[1]'";
}
if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}
}
}
	$sql1="SELECT * 
			FROM test";
	$result1=mysql_query($sql1);
	//ECHO $result;
	$counter=0;
	while($row1=mysql_fetch_array($result1))
	{	
		
		?>
		<div id="box">
		<?php
		$q_id=$row1['q_id'];
		$question=$row1['question'];
		$option1=$row1['option1'];
		$option2=$row1['option2'];
		$option3=$row1['option3'];
		$option4=$row1['option4'];
		$temp1=$option1." ".$q_id;
		$temp2=$option2." ".$q_id;
		$temp3=$option3." ".$q_id;
		$temp4=$option4." ".$q_id;
		$temp5=" ".$q_id;
		?>
		
		<?php
		echo "<p>$question</p>";
		$type=$row1['type'];
		if(strcmp($type,"simplemcq")==0 || strcmp($type,"calculatedmcq")==0)
		{
			?>
			<input type="radio" name="option[$counter]" value="<?php echo "$temp1";?>"><?php
			echo "$option1";?><br>
			<input type="radio" name="option[$counter]" value="<?php echo "$temp2";?>"><?php
			echo "$option2";?><br>
			<input type="radio" name="option[$counter]" value="<?php echo "$temp3";?>"><?php
			echo "$option3";?><br>
			<input type="radio" name="option[$counter]" value="<?php echo "$temp4";?>"><?php
			echo "$option4";?><br>
			<?php
			
		}
		else if(strcmp($type,"truefalse")==0 )
		{
			?>
			<input type="radio" name="option[$counter]" value="<?php echo "$temp1";?>"><?php
			echo "$option1";?><br>
			<input type="radio" name="option[$counter]" value="<?php echo "$temp2";?>"><?php
			echo "$option2";?><br>
			<?php
			
		}
		/*else
		{
			echo "Ans:";?>
			<input type="text" name="option"><?php echo "$temp1";?></input>
			<?php
		}*/
		?>
		<!--
		<button type="button" onclick="button_click('red');">Mark As Review</button>
		</div>
		<script>
			function button_click(color){
				document.getElementById("box").style.backgroundColor=color;
			}
		</script>-->
		<?php
		$counter=$counter+1;
	}
	

mysql_close($con);	
	


?>
<input type='hidden' name='hiddencounter' value='$counter'>
<div align ="center">
<br>
<br>
<br>
<br>
<input type="submit" name ="submit1" value="Submit Section_1">
</form>
</div>

</html>