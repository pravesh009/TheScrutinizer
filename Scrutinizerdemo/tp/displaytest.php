<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Example of Bootstrap 3 Table with Emphasis Classes</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
<?php
session_start();
$y=$_SESSION['uname'];
//echo $y;

	$x=date("Y")."_association";
	//echo $x;
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="select * from ".$x.",user where user.name=".$x.".stdname and user.uname='".$y."' and ".$x.".status='NA'"; 
	$result=mysqli_query($con,$sql);
	$i=0;
	?>
		 <div class="bs-example">
    <table class="table">
        <thead>
            <tr>
                <th>Sr No.</th>
				<th>Test Topic</th>
				<th>Subject</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
	<?php
	while($row = mysqli_fetch_array($result)){
		 $subid=$row['subjID'];
		// $sql2="select * from subject where subject.subjID='".$subid."'";
		$sql3="select * from testcreated where SubjID='".$subid."'";
		 //echo $sql2;
		 $result2=mysqli_query($con,$sql3);
		 ?>
		<?php
		
		 while($row2 = mysqli_fetch_array($result2)){
			 $i++;
			 ?>
        	<tr class="active">
			
                <td><?php echo $i; ?></td>
                
			 <td><?php echo "<a href=test3.php?id=".$row2['TestID']."&sub=".$row2['SubjID']."&uname=".$y.">".$row2['topic']."</a>"; ?></td>
				<?php
				$sql="select * from subject where subjID='".$row2['SubjID']."'";
				$result01=mysqli_query($con,$sql);
				$row3=mysqli_fetch_assoc($result01);?>
				<td><?php echo $row3['subjName'] ; ?></td>
                <td><?php echo $row2['StartDate'] ; ?></td>
                <td><?php echo $row2['EndDate'] ; ?></td>
            </tr>
			<?php
			 echo "<BR>";
			
		 }
		}	
		
	
		mysqli_close($con);
	


?>
</html>