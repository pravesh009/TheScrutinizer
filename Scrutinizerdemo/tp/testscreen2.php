<html>
<body>
<script type="text/javascript">
window.onload = formSubmit;

function formSubmit() {

      document.forms[0].submit();
}

</script>
</body>



<?php
session_start();
echo "<form action=oldtest.php name=f1 id=f1 method=post>";
$count=$_POST["count"];
$level=$_POST["level"];
$counter=$_POST["counter"];
$stime=$_POST["stime"];
//echo $stime;
$qstime=$_POST["qstime"];
$con=mysqli_connect("localhost","root","","Scrutinizer");
echo "count=".$count."<BR>";
for ($i=1;$i<=$count ;$i++)
{
	$status='N';
	$type=$_POST['type'.$i];
	$qid=$_POST["qid".$i];
	$testID=$_SESSION['TestID'];
	$subjID=$_SESSION['subid'];
	$studentID=$_SESSION['uname'];
	//echo $_SESSION['uname']."<BR>".$studentID."<BR>***";
	$answer="";
	$fw=0;
	$sql2="select * from questions";
	$result2=$con->query($sql2);
	 while($row = $result2->fetch_assoc()) {
		 
		 if(strcmp($row['qID'],$qid)==0){
			$NA=$row['NA'];
			$W=$row['W'];
			$C=$row['C'];			
			$weightage=$row['weightage'];	
			$color=$row['colour'];
			$final=$row['final_weightage'];
			$correctans=$row['correctans'];
			
		 }
	 }
	
	
	echo $qid."<BR>TYPE=".$type."<BR>";
	if(strcmp($type,'c')==0){
		echo "its checkbox...<BR>";
		$no=$_POST["no_check"];
		$msg="";
		$f=1;
		for ($i1=0;$i1<=$no;$i1++){
			
			if(isset($_POST[$qid."_".$i1])){
				//echo "attempted";
				if($f==1) {$f=0;$msg=$_POST[$qid."_".$i1];}
				else $msg=$msg.",".$_POST[$qid."_".$i1];
			}
		}
		//echo $msg;
		if($msg==NULL){
			echo "not attemped<BR>";
			$NA=$NA+1;
			$counter--;
			if($counter%2==0){
			$level=($level-1);
			if($level==0)
				$level=1;
			}
		}
		else 
			echo $msg."<BR>";
		$answer=$msg;
	}
	else if(strcmp($type,'r')==0)
	{
		echo "its radio<BR>";
		if(isset($_POST[$qid])){
		$ans=$_POST[$qid];
		echo "ans=".$ans."<BR>";
		$answer=$ans;
		}
		else {
			echo "not attempted<BR>";
			$NA=$NA+1;
		$answer="";
		$counter--;
		if($counter%2==0){
		$level=($level-1);
			if($level==0)
				$level=1;
		}
		}
	}
	else if(strcmp($type,'t')==0)
	{
		echo "textbox<BR>";
		$ans=$_POST[$qid];
		echo "ans=".$ans."<BR>";
		if (strlen(trim($ans))>0){
		echo "attempted";
		
		}
		else {
			echo "not attempted<BR>";
			$NA=$NA+1;
			$counter--;
			if($counter%2==0){
			$level=($level-1);
			if($level==0)
				$level=1;
	}
	}
	$answer=$ans;
		}
		
	
	echo "==================================".strlen($answer)."<BR>";
	if(strlen($answer)>0){
	$sql="select * from questions where questions.qID=".$qid." and questions.correctans='".$answer."'";
	//echo $sql."<BR>";
	$result=mysqli_query($con,$sql);
	if (mysqli_num_rows($result) > 0) {
		$status="C";
		$C=$C+1;
		//changes to be done here
		$counter++;
		if($counter%2==0&&$counter!=0){
		$level=($level+1)%6;
		if($level==0)
			$level=5;
		}
	}
	else{
	$status="W";
	$W=$W+1;
	$counter--;
	if($counter%2==0){
	$level=($level-1);
	if($level==0)
		$level=1;
	}
	}
	}
	//echo "<br>NA=".$NA."<br>W=".$W."<br>C=".$C."<br>";	
	$Z=3*((2*$NA)+(1.2*$W)-$C);
	//echo "z=".$Z."<br>";
	$attemps=$NA+$W+$C;
	$min=(-3*$attemps);
	$max=(3*$attemps);
	$x=(-1)*(($min-$max)/5);
	echo "X=".$x."<br>";
	if($Z<$x)
		$fw=1;
	else if($Z<=2*$x&&$Z>$x)
		$fw=2;
	else if($Z<=3*$x&&$Z>2*$x)
		$fw=3;
	else if($Z<4*$x&&$Z>3*$x)
		$fw=4;
	else 
		$fw=5;
	
	if($attemps>100){
		$fw=$fw;
	}
	else if($attemps>=50 && $attemps<=100){
		$fw=(0.50*$weightage+0.5*$fw);
	}
	else if($attemps>=35 && $attemps<50){
		$fw=(0.70*$weightage+0.3*$fw);
	}
	else if($attemps>=20 && $attemps<35){
		$fw=(0.80*$weightage+0.2*$fw);
	}
	else if($attemps>10 && $attemps<20){
		$fw=(0.90*$weightage+0.1*$fw);
	}
	else
		$fw=$weightage;
	echo "final weightage=".$fw."<br>";
	//echo "attemps".$attemps."<br>";
	
		
	date_default_timezone_set('Asia/Kolkata');
	$date=date('H:i:s');
	/*$tname=date("Y")."_association";
	$sql02="select * from ".$tname." where TestID='".$testID."' and stdname='".$studentID."'"; 
	echo $sql02;
	$result02=mysqli_query($con,$sql02);
	$row02=mysqli_fetch_assoc($result02);*/
	echo "************";
	//echo $_SESSION['time'];
	echo "************";
	$st=$_POST['qstime'];
	$difference=date_create($st)->diff(date_create($date))->format('%H:%i:%s');
	echo "DIFFERENCE:".$difference."";
	$sql="insert into test values('".$testID."','".$subjID."','".$studentID."','".$qid."','".$answer."','".$status."','".$st."','".$date."','".$difference."')";
	//echo "***".$sql."***<BR>";
	$st=$date;
	echo $qid;
	mysqli_query($con,$sql);
	if(ceil($fw)!=$final)
		$color='R';
	else
		$color='';
	$sql4="insert into questions (colour)values($color) where questions.qID='".$qid."'";
	mysqli_query($con,$sql4);
	$sql3="update questions set NA=".$NA." , W=".$W." , C=".$C." ,final_weightage=".ceil($fw)." where questions.qID='".$qid."'"; 
	
	 echo "<input type=hidden name=level value=".$level.">";
	  echo "<input type=hidden name=counter value=".$counter.">";
	 echo "<input type=hidden name=s value=1>";
	 echo "<input type=hidden name=s1 value=1>";
	 echo "<input type=hidden name=stime value=".$stime.">";
	 echo "<input type=hidden name=qstime value=".$st.">";
	 echo "<input type=hidden name=value value=".$testID.">";
	 echo "<input type=hidden name=uname value=".$studentID.">";
	 echo "<input type=hidden name=questID value=".$qid.">";
	// echo "<input type=submit name=button value=Submit >";
	mysqli_query($con,$sql3);
}
mysqli_close($con);
	
?>
</html>