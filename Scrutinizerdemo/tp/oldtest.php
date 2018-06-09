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
$con=mysqli_connect("localhost","root","","Scrutinizer");
		if(isset($_POST['s'])){
			$y=$_POST['value'];
			$z=$_POST['uname'];
			$st=$_POST["stime"];
			$prevtime=$_POST["qstime"];
			echo $prevtime;
			$questid=$_POST['questID'];
			$sql001="select * from test where qID='".$questid."' and studentID='".$z."' and testID='".$y."' ";
			$result001=mysqli_query($con,$sql001);
			$row001=mysqli_fetch_assoc($result001);
			$et=$row001['end'];
			/*echo strtotime($et);
			echo "<BR>";
			echo strtotime($stime);
			echo round(abs($et-$stime));*/
			$time1 = new DateTime($et);
			$time2 = new DateTime($st);
			$interval = $time1->diff($time2);
			echo $interval->format('%s');
		    if($interval->format('%s')>10){
				$query = array(
					'testid' => $_POST['value'], 
					'uname' => $_POST['uname'],
				);
				$query = http_build_query($query);
				
				header("Location:../graph/graph01.php?$query");
			}
			
		}
		
		else{
		$y=$_GET['value'];
		$_SESSION['TestID']=$y;
		//echo $y;
		$z=$_GET['uname'];
		
		$_SESSION['uname']=$z;
		echo "*".$_SESSION['uname'];
		}
		
		$x=$_SESSION['subid'];
		$sql="select * from testcreated where TestID='".$y."'";
		$result1=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result1);
		$time=$row['TestDuration'];
		//echo $time;
		echo "<center>Following are the questions for ".$x."</center><BR>";
		?>
		
	</div>
	<!--<script type="text/javascript">
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
		
	</script>-->
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
	
	if(isset($_POST['s'])){
		$inlvl=$_POST['level'];
		$counter=$_POST['counter'];
	}
	else{
		$inlvl=3;
		$counter=0;
	}
		
		$sql1="select * from user where uname='".$z."'";
		//echo $sql1;
		$result01=mysqli_query($con,$sql1);
		$row01=mysqli_fetch_assoc($result01);
		$name=$row01['name'];
		$tname=date("Y")."_association";
		$sql02="select * from ".$tname." where TestID='".$y."' and stdname='".$name."'"; 
		$result02=mysqli_query($con,$sql02);
		$row02=mysqli_fetch_assoc($result02);
		$time01=$row02['starttime'];
		if(!isset($_POST['s'])){
			$pt=$time01;
		}
		else{
		$pt=$prevtime;
		echo "PRev Time:".$pt."";
		}
		//$_SESSION['time']=$time01;
		echo "<div class=element>";
		echo "<div class=clock style=margin:2em;><h2>Start time:".$time01."</h2>";
		echo "<div class=message></div>";
		echo $counter;
		echo "<BR>";
	//$sql01="select * from questions,test where questions.status='A' and questions.subjID='".$x."' and  and test.qID!=questions.qID  ";
	$sql01="select * from questions where questions.status='A' and questions.subjID='".$x."' and questions.qID not in (select qID from test where test.subID='".$x."' and test.testID=".$y." and test.studentID='".$z."') and questions.final_weightage='".$inlvl."'";
	//$sql02="select * from test where status='A' and subjID='".$x."' and final_weightage='".$inlvl."' ";
echo $sql01;
echo "<BR>";
	$result=mysqli_query($con,$sql01);
	$row1=mysqli_num_rows($result);
	echo $row1;
	echo "<BR>";
	
	
	$x=0;
	if (mysqli_num_rows($result) > 0) {
	//while ($row = mysqli_fetch_assoc($result)){
		$count=$count+1;
					//echo "Q)".$row['qID']." ".$row['question']."<BR>";
					echo "<legend> Question".($x+1)."</legend>";
					$x++;
					$r=rand(1,$row1);
					//echo $r;
					echo "<BR>";
					$i=0;
					while($row = mysqli_fetch_assoc($result)){
						if($i==$r-1){
							
					
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
			break 1;
		}
		else
			$i++;
	 
	 }
	 echo "<input type=hidden name=count value=".$count.">";
	 echo "<input type=hidden name=stime value=".$time01.">";
	 echo "<input type=hidden name=level value=".$inlvl.">";
	 echo "<input type=hidden name=qstime value=".$pt.">";
	 echo "<input type=hidden name=counter value=".$counter.">";
	 echo "<input type=submit></form>";
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
	//}
	
	mysqli_close($con);
	

	}
?>
