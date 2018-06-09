<head>
<link rel="stylesheet" href="FlipClock-master/compiled/flipclock.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="FlipClock-master/compiled/flipclock.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
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

<?php
session_start();
		
		$x=$_SESSION['subid'];
		echo "<center>Following are the questions for ".$x."</center><BR>";
		?>
		<div class="element">
		<div class="clock" style="margin:2em;"></div>
		<div class="message"></div>
	</div>
	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {

			clock = $('.clock').FlipClock(600, {
		        clockFace: 'MinuteCounter',
		        countdown: true,
		        callbacks: {
		        	stop: function() {
						window.alert("Time is up. Press OK to continue."); 
						window.location = "test3.php"
		        	}
		        }
		    });

		});
		
	</script>
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
	<?php
echo "<fieldset>";
$count=0;
	echo "<form action=testscreen2.php method=post>";
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	
	$sql="select * from questions where status='A' and subjID='".$x."' order by subjID,weightage desc";
	$result2=mysqli_query($con,$sql);
$x=0;


	if (mysqli_num_rows($result2) > 0) {
	while ($row = mysqli_fetch_assoc($result2)){
		$count=$count+1;
					//echo "Q)".$row['qID']." ".$row['question']."<BR>";
					echo "<legend> Question".($x+1)."</legend>";
					$x++;
					echo $row['question'];
					echo "<BR>";
		echo '<input type=hidden name=qid'.$count.' value='.$row['qID'].">";
		if(strcmp($row['type'],"True/False")==0){
			echo "<input type=hidden name=type".$count." value='r'>";
			echo "<input type=radio name=".$row['qID']." value=1 id=RadioGroup1_0>";
			echo "True"."<BR>";
            echo "<input type=radio name=".$row['qID']." value=2 id=RadioGroup1_1>";
            echo "False"."<BR>";
			echo "<BR>";
			
			}
		if(strcmp($row['type'],"Value Entry")==0){
			echo "<input type=hidden name=type".$count." value='t'>";
			echo "<input type=text name=".$row['qID']."><BR>";
			}
			else{
		$correctans_array=explode(",",$row['correctans']);
	    $len=sizeof($correctans_array);
		
		$c=0;
	$op_array=explode("~",$row['options']);
	$length=sizeof($op_array);
	
	
		if($len==1&&strcmp($row['type'],"True/False")!=0){
			echo "<input type=hidden name=type".$count." value='r'>";
			for ($i=0;$i<$length;$i++)
			{
				if(strlen($op_array[$i])>0) 
				{
					echo "<input type=radio name=".$row['qID']." value=".($i+1)." id=RadioGroup1>";
					echo "$op_array[$i]";
    				
				}
				echo "<br>";
			}
		}
		else if($len>1 && strcmp($row['type'],"True/False")!=0){
		echo "<input type=hidden name=type".$count." value='c'>";
		$check_id=0;
		for ($i=0;$i<$length;$i++)
			{
				if(strlen($op_array[$i])>0) 
				{
					echo "<input type=checkbox name=".$row['qID']."_".$i." value=".($i+1)." id=CheckboxGroup1_0>";
   					echo $op_array[$i];
					echo "<BR>";
					$check_id++;
    				
				}
			}
			echo '<input type=hidden name=no_check value='.$check_id.'>';
			echo "<br>";
			}
			}
	 
	 
	 }
	 echo "<input type=hidden name=count value=".$count.">";
	 echo "<input type=submit ></form>";
	 echo "</fieldset>";
	 ?>
	 </div>
		<div class ="col-lg-3">
			<div align="center">
				<br>
				<br>
				<br>
				<br>

				
			</div>
		</div>
		<?php
	}
	
	mysqli_close($con);
	


?>