<head>

	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->

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
		$y=$_GET['value'];
		$_SESSION['TestID']=$y;
		$z=$_GET['uname'];
		$_SESSION['uname']=$z;
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
						window.location = "../graph/graph02.php"
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
	echo "<form action=oldtestresult.php method=post>";
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	
	$sql="select * from questions where status='A' and subjID='".$x."' order by subjID,weightage desc";
	$result2=mysqli_query($con,$sql);
$x=0;
	$sql2="select * from testcreated where TestID='".$y."'";
	//echo $sql2;
	$result3=mysqli_query($con,$sql2);
	$row1=mysqli_fetch_assoc($result3);
	//echo "##############";
	$noq=$row1['noq'];

	if (mysqli_num_rows($result2) > 0) {
		$rows = mysqli_num_rows($result2);
		$a=1;
	while ($row = mysqli_fetch_assoc($result2)){
		$count=$count+1;
					//echo "Q)".$row['qID']." ".$row['question']."<BR>";
					if($a==1){
					
					?>
                       <div id='question<?php echo $a;?>' class='cont'>
					   <?php   	echo "<legend> Question".($x+1)."</legend>";
					$x++; ?>
                    <p class='questions' id="qname<?php echo $a;?>"><?php $a ?>.<?php echo $row['question'];?></p>
                   <?php echo "<BR>";
				   
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
			?>
			<button id='next<?php echo $a;?>' class='next btn btn-success' type='button'>Next</button>
                    
				<?php	echo "</div>";
				
				}
					
					
					
					
					
					
					
					elseif($a<1 || $a<$noq){
						
					?>
                       <div id='question<?php echo $a;?>' class='cont'>
					<?php   	echo "<legend> Question".($x+1)."</legend>";
					$x++; ?>
                    <p class='questions' id="qname<?php echo $a;?>"><?php $a ?>.<?php echo $row['question'];?></p>
                   <?php
				   	
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
			?>
			<button id='next<?php echo $a;?>' class='next btn btn-success' type='button'>Next</button>
                    
				<?php	
					echo "</div>";	
					}
					
					
					
					
					elseif($a==$noq){
					
					?>
                       <div id='question<?php echo $a;?>' class='cont'>
					   <?php   	echo "<legend> Question".($x+1)."</legend>";
					$x++; ?>
                    <p class='questions' id="qname<?php echo $a;?>"><?php $a?>.<?php echo $row['question'];?></p>
                   <?php
				   
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
			?>
			
			<button id='next<?php echo $i;?>' class='next btn btn-success' type='submit'>Finish</button>
                <?php
				echo "<input type=hidden name=count value=".$count.">";
	 //echo "<input type=submit ></form>";
	 echo "</fieldset>";  
					echo "</div>";
					}
	 
	 $a++;
	 }
	
	 ?>
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.validate.min.js"></script>

		<script>
		$('.cont').addClass('hide');
		//count=$('.questions').length;
		//
		
		// document.write(count);
		 $('#question'+1).removeClass('hide');
		 $(document).on('click','.next',function(){
		     element=$(this).attr('id');
			 //document.write(element);
		    // last = parseInt(element.substr(element.length - 1));
			 if(element==='next1')
				 last=1;
			 else
				 last++;
			 
				 
		     nex=last+1;
			 //document.write(nex);

		     $('#question'+last).addClass('hide');

		     $('#question'+nex).removeClass('hide');
			 //
		 });

		

		</script>
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

		