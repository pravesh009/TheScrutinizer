<html>
<head>
<meta http-equiv="refresh" content="3">
</head>
<?php
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	
	$sql="select * from questions,subject where subject.subjID=questions.subjID and questions.status='A' order by subject.subjID,final_weightage desc ";
	$result2=mysqli_query($con,$sql);
	if(!$result2) echo "Failure";
	echo "<table border=7 width=100%>
	<tr>
	<th>Subject ID</th>
	<th>Subject Name</th>
	<th>Question ID</th>
	<th>Questions</th>
	<th>Question Weightage</th>
	
	</tr> ";
	
	if (mysqli_num_rows($result2) > 0) {
	while ($row = mysqli_fetch_assoc($result2)){
		if ($row["colour"]=='R') 
		{
			$sql2="update questions set colour='' where qID=".$row['qID'];
			mysqli_query($con,$sql2);
			echo "<tr bgcolor='red'>";
		}
		else echo "<tr>";
		echo "<td>".$row['subjID']."<td align=center>".$row['subjName']."<td align=center>".$row['qID']."<td>".$row['question']."<td>".$row['final_weightage'];
		
	 }
	}
	 echo "</table>";
	mysqli_close($con);



?>