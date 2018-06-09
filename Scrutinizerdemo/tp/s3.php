<html>
<head>
	<link rel="stylesheet" href="FlipClock-master/compiled/flipclock.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="FlipClock-master/compiled/flipclock.js"></script>
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
	<body>
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
					<h4>Sample Test</h4>    
					<br> 
				</ul>
            </div>
           
        </div>
   </div>
	<div class="element">
		<div class="clock" style="margin:2em;"></div>
		<div class="message"></div>
	</div>
	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {

			clock = $('.clock').FlipClock(60, {
		        clockFace: 'MinuteCounter',
		        countdown: true,
		        callbacks: {
		        	stop: function() {
						window.alert("Time is up. Press OK to continue."); 
						window.location = "s4.php"
		        	}
		        }
		    });

		});
		
	</script>
	
	</body>
<?php

$con=mysqli_connect("localhost","root","","questions");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$db = mysqli_select_db("questions", $con);

$sql1="SELECT * 
			FROM test";
	$result1=mysqli_query($con,$sql1);
	//ECHO $result;
	if (!mysqli_query($con,$sql1)) {
  die('Error: ' . mysqli_error($con));
}
	$counter=0;
	while($row1=mysqli_fetch_array($result1))
	{	
		$test_id=$row1['test_id'];
		if($test_id>12)
		{
		$q_id[$counter]=$row1['q_id'];
		$question[$counter]=$row1['question'];
		$type[$counter]=$row1['type'];
		$option1[$counter]=$row1['option1'];
		$option2[$counter]=$row1['option2'];
		$option3[$counter]=$row1['option3'];
		$option4[$counter]=$row1['option4'];
		$temp1[$counter]=$option1[$counter]." ".$q_id[$counter];
		$temp2[$counter]=$option2[$counter]." ".$q_id[$counter];
		$temp3[$counter]=$option3[$counter]." ".$q_id[$counter];
		$temp4[$counter]=$option4[$counter]." ".$q_id[$counter];
		$counter=$counter+1;
		}
	}
?>
<form method="post" action="s4.php">
<br>
<br>
<br>
<br>
<?php

		?>
		<div class="container">
	<div class="row">
		<div class ="col-lg-1">
			<div align="center">
				<br>
				<br>
				<br>
			</div>
		</div>
		<div class="col-lg-8">
	<fieldset>
	<legend> Question <?php echo 3; ?></legend>
	<?php
	$x=(rand(30,40));
		echo "<p>$question[$x]</p>";
		if(strcmp($type[$x],"simplemcq")==0 || strcmp($type[$x],"calculatedmcq")==0)
		{
			?>
			<input type="radio" name="option<?php echo"$x"; ?>" value="<?php echo "$temp1[$x]";?>"><?php
			echo "$option1[$x]";?><br>
			<input type="radio" name="option<?php echo"$x";?>" value="<?php echo "$temp2[$x]";?>"><?php
			echo "$option2[$x]";?><br>
			<input type="radio" name="option<?php echo"$x";?>" value="<?php echo "$temp3[$x]";?>"><?php
			echo "$option3[$x]";?><br>
			<input type="radio" name="option<?php echo"$x";?>" value="<?php echo "$temp4[$x]";?>"><?php
			echo "$option4[$x]";?><br>
			<?php
			
		}
		else if(strcmp($type[$x],"truefalse")==0 )
		{
			?>
			<input type="radio" name="option<?php echo "$x";?>" value="<?php echo "$temp1[$x]";?>"><?php
			echo "$option1[$x]";?><br>
			<input type="radio" name="option<?php echo "$x";?>" value="<?php echo "$temp2[$x]";?>"><?php
			echo "$option2[$x]";?><br>
			<?php
			
		}
		
		?>
		<br>
		</fieldset>
		</div>
		<div class ="col-lg-3">
			<div align="center">
				<br>
				<br>
				<br>
				<br>

				
			</div>
		</div>
		
		</div>
	</div>

		<!--<button type="button" onclick="button_click('red');">Mark As Review</button>-->
		<input type='hidden' name='hiddencounter' value="<?php echo "$counter";?>">
		<div align="center">
			<input type="submit" name="Next" value="Next">
		</div>
		</form>	
</html>