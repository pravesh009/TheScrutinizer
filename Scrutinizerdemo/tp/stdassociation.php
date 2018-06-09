<html>
<head>
<script type="text/javascript">
checked=false;
function checkedAll (frm1) {var aa= document.getElementById('frm1'); if (checked == false)
{
checked = true
}
else
{
checked = false
}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
}
</script>
</head>
</html>
<?php
session_start();
$x=$_SESSION['tid'];
echo "<form method=post action=stdassociation.php>";

$con=mysqli_connect("localhost","root","","Scrutinizer");
$sql="select subjName,subject.subjID as subjID from association,subject where tid='".$x."' and association.subjID=subject.subjID and subject.status='A';";

//echo $sql;
$result=mysqli_query($con,$sql);
echo "Select Subject";
echo "<select name='subid' id='subid' >";
while ($row = mysqli_fetch_array($result)){
		echo "<option value='".$row['subjID']."'>".$row['subjName']."</option>";
	 }
	echo "</select><BR>";

	$result=mysqli_query($con,$sql);
$sql2="select distinct category from user,tadmin where tid='$x' and user.cadmin=tadmin.cadmin";
//echo $sql;
$result2=mysqli_query($con,$sql2);

echo "Select Category";
echo "<select name='category' id='category' >";
while ($row2 = mysqli_fetch_array($result2)){
		echo "<option value='".$row2['category']."'>".$row2['category']."</option>";
	 }
	
echo "<input type=hidden name=subjID value=".$row['subjID'].">";

?>
<input type="hidden" name="s" value=1>

<input type="submit" name="submit" id="submit" value="Submit">

</form>
<?php
if (isset($_POST['s'])&&$_POST['s']==1)
{
	$sub=$_POST['subid'];
	echo "<form method=post id=frm1 action=stdassociation.php>";
	echo "Select Test:";
	$sql7="select distinct TestID,topic from testcreated where Tid='".$x."' and SubjID='".$sub."'";
	$result7=mysqli_query($con,$sql7);
	echo "<select name='testid' id='testid' >";
	while ($row7 = mysqli_fetch_array($result7)){
		
		echo "<option value='".$row7['TestID']."'>".$row7['topic']."</option>";
	 }
	echo "<BR>";	
	echo "<input type=checkbox name=checkall onclick='checkedAll(frm1)'>";
	echo "Select all<BR>";
	$y=$_POST['category'];
	$sql3="select * from user where category='".$y."'";
$result3=mysqli_query($con,$sql3);
$i=1;
while ($row3 = mysqli_fetch_array($result3)){
		$x=$row3['name'];
		echo "<input type=checkbox name=c".$i." value=".$x.">";
		echo $row3['name'];
		$i++;
		echo "<BR>";
	 }
	 
echo "<input type=hidden name=subid value=".$sub.">";
echo "<input type=hidden name=s value=2>";
echo "<input type=hidden name=i value=".$i.">";
echo "<input type=submit name=submit1 id=submit1 value=Submit>";
}
echo "</form>";

if (isset($_POST['s'])&&$_POST['s']==2)
{
	
	$sql4="show tables";
			  
		$result4=mysqli_query($con,$sql4);
			
	$x=date("Y")."_association";
	//echo $x;
	$y=0;
	while ($row4 = mysqli_fetch_array($result4)){
	
		//echo $row3[0];
		//echo "<BR>";
		if(strcmp($row4[0],$x)==0){
			$y=1;
			break;
		}
	 }
	if($y!=1){
		$sql5="create table ".$x." (stdname varchar(50),TestID int(10),tid varchar(10),subjID varchar(10))";
		//echo $sql5
		mysqli_query($con,$sql5);
	}
	
	$z=$_POST['i'];
	echo $z;
	for($j=1;$j<=$z;$j++){
		if(isset($_POST['c'.$j])){
			
			$name=$_POST['c'.$j];
			echo $name;
			$tid=$_SESSION['tid'];
			$testid=$_POST['testid'];
			$subjID=$_POST['subid'];
			$status="NA";
			echo $tid;
			echo $x;
			
			$sql8="insert into ".$x." values ('".$name."','".$testid."','".$tid."','".$subjID."','','".$status."')";
			echo $sql8;
			mysqli_query($con,$sql8);
			
		}
	}

	
	
		mysqli_close($con);
	
	
}






?>

