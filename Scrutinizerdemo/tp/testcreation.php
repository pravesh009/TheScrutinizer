<html>
<head>
<script>
function showadap(a){
   if(a==1){
	document.f1.s.value=1;
   document.getElementById("level").disabled=true;
   document.getElementById("noq").disabled=true;
   document.getElementById("submit").disabled=false;
   }
   else{
	   document.f1.s.value=2;
	document.getElementById("level").disabled=false;
   document.getElementById("noq").disabled=false; 
document.getElementById("submit").disabled=false;   
   } 
	
}
</script>
</head>
<?php
session_start();
if(isset($_POST['s'])){
	
	if($_POST['s']==1)
		$testtype='Adaptable';
	else
		$testtype='Non-Adaptable';
	$Tid=$_SESSION['tid'];
	$SubjID=$_POST['sub'];
	$TestDuration=$_POST['duration'];
	$StartDate=$_POST['sdate'];
	$EndDate=$_POST['edate'];
	$topic=$_POST['topic'];
	$StartTime=$_POST['stime'];
	$EndTime=$_POST['etime'];
	if(isset($_POST['noq'])){
	$Noq=$_POST['noq'];
	$level=$_POST['level'];
	}
	else{
		$Noq="";
		$level="";
	}
	$Parameter='st='.$StartTime.';et='.$EndTime.';noq='.$Noq.';lv='.$level;
	
	
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="insert into testcreated (Tid,topic,SubjID,testType,TestDuration,noq,StartDate,EndDate,Parameter)values ('$Tid','$topic','$SubjID','$testtype','$TestDuration','$Noq','$StartDate','$EndDate','$Parameter')";
			  
		mysqli_query($con,$sql);
			
			echo "Test created successfully";
	
		mysqli_close($con);
}

?>

<?php

echo "<form action=testcreation.php name=f1 method=post>";
echo "<input type=hidden name=s value=1>";
echo "Select Test Type : ";
echo "<input type=button value=Adaptable id=a onclick='showadap(1)'>";
echo "<input type=button value=Non-Adaptable id=na onclick='showadap(2)'><BR>";
echo "<form method=post action=testcreation.php>";
$x = $_SESSION["tid"];
$con=mysqli_connect("localhost","root","","Scrutinizer");
$sql="select subjName,subject.subjID as subjID from association,subject where tid='".$x."' and association.subjID=subject.subjID and subject.status='A';";
//echo $sql;
$result=mysqli_query($con,$sql);
echo "Select Subject : ";
echo "<select name='sub'>";
while ($row = mysqli_fetch_array($result)){
		echo "<option value='".$row['subjID']."'>".$row['subjName']."</option>";
	 }
	echo "</select><BR>";
echo "Enter topic name:";
echo "<input tupe=text name=topic id=t><BR>";
	$result=mysqli_query($con,$sql);
?>
<p>
            <label for="textfield">Enter Test Duration : </label>
            <input type="time" name="duration" id="d">
            
            
          </p><br>
	<p>
            <label for="textfield">Start Date: </label>
            <input type="date" name="sdate" id="sdate">
            
            <label for="textfield">End Date: </label>
            <input type="date" name="edate" id="edate">
          </p>
<br>
		  <p>
            <label for="textfield">Start Time: </label>
            <input type="time" name="stime" id="stime">

            <label for="textfield">End Time: </label>
            <input type="time" name="etime" id="etime">
            
            
          </p><br>
		  <p>
            <label for="textfield">Number of Questions: </label>
            <input type="text" name="noq" id="noq">
		</p>	<br>
		<p>
		<label for="textfield">Select starting difficulty level: </label>
		<select id="level" name="level" >
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
   <option value="5">5</option>
</select>
</p>	<br>
<p>
  <input type="submit" name="submit" id="submit" value="Create" disabled>
</p>
</form>	
	
