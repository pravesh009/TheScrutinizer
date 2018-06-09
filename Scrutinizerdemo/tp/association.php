
<?php
$con=mysqli_connect("127.0.0.1:3306",'root','','Scrutinizer');
if (isset($_POST['teachers']))
{
	$count=$_POST['count'];
	$teacher=$_POST['teachers'];
	//echo "name=".$teacher."<BR>";
	for ($i=1;$i<$count;$i++)
	{
		if(isset($_POST["s".$i]))	
		{
			$s=$_POST["s".$i];
			if($s<>"")
			{
				//echo "you selected ".$s."<BR>";	
				$sql="insert into association values ('".$teacher."','".$s."','A')";//which are not ticked needs to be inactive
					  
		mysqli_query($con,$sql);
			}
		}
	}
}
	echo "<form name='teacher_subj_assoc' method=POST action=association.php>";
	$con=mysqli_connect("127.0.0.1:3306",'root','','Scrutinizer');
	$sql="select * from tadmin";
	$result=mysqli_query($con,$sql);


echo "<select name='teachers'>";
while ($row = mysqli_fetch_array($result)){
		echo "<option value='".$row['tid']."'>".$row['tname']."</option>";
	 }
	echo "</select><BR>";
		$sql="select * from subject order by status,subjName";
	$result=mysqli_query($con,$sql);


$i=1;
while ($row = mysqli_fetch_array($result)){
	//on screen change in checkbox of teachers
	//$sql2="select * from association where subjID='".$row['row']."' and status='A' and tid=";
		if(strcmp($row['status'],'A')==0)
		echo "<input type=checkbox name=s".$i." value=".$row['subjID']."> ".$row['subjName']."<BR>";
		else
		echo "<input type=checkbox name=s".$i." value=".$row['subjID']." disabled> ".$row['subjName']."<BR>";
		$i=$i+1;
	 }
	 echo "<input type=hidden name=count value=".$i.">";

	mysqli_close($con);
?>
<input type=submit>
</form>
