
<?php
session_start();

	
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="show tables";
			  
		$result3=mysqli_query($con,$sql);
			
	$x=date("Y")."_association";
	//echo $x;
	$s=0;
	while ($row3 = mysqli_fetch_array($result3)){
	
		//echo $row3[0];
		//echo "<BR>";
		if(strcmp($row3[0],$x)==0){
			$s=1;
			break;
		}
	 }
	if($s!=1){
		$sql2="create table ".$x." (stdname varchar(50),TestID int(10),tid varchar(10),subjID varchar(10))";
		echo $sql2;
		mysqli_query($con,$sql2);
	}
		mysqli_close($con);
	


?>