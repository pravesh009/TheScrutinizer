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
echo "<form action=../graph/graph02.php name=f1 id=f1 method=post>";

$count=$_POST["count"];

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
	echo $_SESSION['uname']."<BR>".$studentID."<BR>***";
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
				if($f==1) {$f=0;$msg=$_POST[$qid."_".$i1];}
				else $msg=$msg.",".$_POST[$qid."_".$i1];
			}
		}
		if($msg==NULL){
			echo "not attemped<BR>";
			$NA=$NA+1;
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
	}
	else{
	$status="W";
	$W=$W+1;
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
	
	echo "final weightage=".$fw."<br>";
	//echo "attemps".$attemps."<br>";
	
		
	date_default_timezone_set('Asia/Kolkata');
	$date=date('H:i:s');
	$difference=date_create($date)->diff(date_create($date))->format('%H:%i:%s');
	$sql="insert into test values('".$testID."','".$subjID."','".$studentID."','".$qid."','".$answer."','".$status."','".$date."','".$date."','".difference."')";
	echo "***".$sql."***<BR>";
	mysqli_query($con,$sql);
	if(ceil($fw)!=$final)
		$color='R';
	else
		$color='';
	$sql4="insert into questions (colour)values($color) where questions.qID='".$qid."'";
	mysqli_query($con,$sql4);
	$sql3="update questions set NA=".$NA." , W=".$W." , C=".$C." ,final_weightage=".ceil($fw)." where questions.qID='".$qid."'"; 
	mysqli_query($con,$sql3);
	echo "<input type=hidden name=s value=1>";
	echo "<input type=hidden name=testid value=".$testID.">";
	echo "<input type=hidden name=uname value=".$studentID.">";
}
mysqli_close($con);
	
?>
</html>