<?php

$con=mysql_connect("localhost","root","");
// Check connection
if (mysqli_connect_error()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	$db = mysql_select_db("questions", $con);
	$sql1="SELECT * 
			FROM weightage			
			WHERE weightage.diff_level=0 AND weightage.stream='science' AND NOT EXISTS (SELECT q_id
																				FROM test
																				WHERE weightage.q_id=test.q_id)
			ORDER BY RAND()
			LIMIT 1";
	$result1=mysql_query($sql1);
	if($result1 === FALSE) { 
    die(mysql_error());
}
	while($row1=mysql_fetch_array($result1))
	{
		$q_id=$row1['q_id'];
		$question=$row1['question'];
		$iq=$row1['iq'];
		$type=$row1['type'];
		$stream=$row1['stream'];
		$image=$row1['image'];
		$keyword=$row1['keyword'];
		$option1=$row1['option1'];
		$option2=$row1['option2'];
		$option3=$row1['option3'];
		$option4=$row1['option4'];
		$correct=$row1['correct'];
		$length=$row1['length'];
		$rep=$row1['repetition'];
		$weight=$row1['weightage'];
		$diff=$row1['diff_level'];
		
		$sj1="INSERT INTO test(q_id,question,iq,type,stream,image,keyword,option1,option2,option3,option4,correct,length,repetition,weightage,diff_level)
VALUES ('$q_id','$question','$iq','$type','$stream','$image','$keyword','$option1','$option2','$option3','$option4','$correct','$length',$rep,$weight,$diff)";
if (!mysql_query($sj1)) {
  die('Error: ' . mysql_error($con));
}

echo $question;

	} 
?>