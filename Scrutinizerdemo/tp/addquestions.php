
<?php
session_start();
echo "<form method=post action=addquestions.php>";
$x = $_SESSION["tid"];
$con=mysqli_connect("localhost","root","","Scrutinizer");
$sql="select subjName,subject.subjID as subjID from association,subject where tid='".$x."' and association.subjID=subject.subjID and subject.status='A';";
echo $sql;
$result=mysqli_query($con,$sql);
echo "<select name='sub'>";
while ($row = mysqli_fetch_array($result)){
		echo "<option value='".$row['subjID']."'>".$row['subjName']."</option>";
	 }
	echo "</select><BR>";
	$result=mysqli_query($con,$sql);
	
	
	

?>
<input type=hidden name=s value=1>
<input type="submit" name="submit" id="submit" value="Submit">

</form>
<?php
	if (isset($_POST['s']))
{
	
	if ($_POST["s"]==2)
	{	
		
	echo "Insertion Sucessful";
	$tid=$_SESSION['tid'];
	$subjID=$_SESSION['subjID'];	
	$question=$_POST['question'];
	$type=$_POST['type'];
	$imgpresent=$_POST['RadioGroup1'];
	$option1=$_POST['option1'];
	$option2=$_POST['option2'];
	$option3=$_POST['option3'];
	$option4=$_POST['option4'];
	$option5=$_POST['option5'];
	$option6=$_POST['option6'];
	$option7=$_POST['option7'];
	$option8=$_POST['option8'];
	$option9=$_POST['option9'];
	$option10=$_POST['option10'];
	$correctans=$_POST['correctans'];
	$str=$option1.'~'.$option2.'~'.$option3.'~'.$option4.'~'.$option5.'~'.$option6.'~'.$option7.'~'.$option8.'~'.$option9.'~'.$option10;
	$w=0;
	$l=strlen($question);
	echo $w;
	if($l<=100&&$l>=50)
		$w=$w+5;
	else if($l>100)
		$w=$w+10;
echo $w."=len;";
echo "[".$imgpresent."]";
	if($imgpresent=="No"||$imgpresent=="NA"||$imgpresent=="no")
		$w=$w+5;
echo $w."img;";
	if(strcmp($type,"True/False")!=0)
		$w=$w+5;
echo $w."T/F;";
	if(strcmp($type,"Value Entry")==0)
		$w=$w+20;
echo $w."vE;";		
	$c=0;
	$op_array=explode("~",$str);
	$length=sizeof($op_array);
	$isnum=1;
	for ($i=0;$i<$length;$i++)
	{
		
		if(strlen($op_array[$i])>0) 
		{
			++$c;
			
			if(is_numeric($op_array[$i])==NULL)
			{
				echo ">>".$op_array[$i]."<<";
				$isnum=0;
			}
		}
		
	}
	//echo "no of options=".$c."<BR>";
	if($c<=4&&$c>=2)
		$w=$w+10;
	else if($c>=5)
		$w=$w+15;
	echo $w."Options;";
	$correctans_array=explode(",",$correctans);
	$len=sizeof($correctans_array);
	if($len>1)
		$w=$w+30;
	else
		$w=$w+20;
	echo $w."No of correct ans;";	
	
	if($isnum==0)
		$w=$w+10;
		
	else
		$w=$w+15;
	
	echo $w."Numeric";
	$weightage=0;
	if($w<=40)
		$weightage=1;
	else if($w>=41&&$w<=50)
		$weightage=2;
	else if($w>=51&&$w<=60)
		$weightage=3;
	else if($w>=61&&$w<=70)
		$weightage=4;
	else
		$weightage=5;
		
	 		
$final_weightage=$weightage;
	$con=mysqli_connect("localhost","root","","Scrutinizer");
	$sql="insert into questions (tid,subjID,question,type,image,imagefile,options,correctans,weightage,final_weightage,status) values ('$tid','$subjID','$question','$type','$imgpresent','xxxx','$str','$correctans','$weightage','$final_weightage','A')";
	mysqli_query($con,$sql);
	
		mysqli_close($con);
}
}
?>

<?php
if (isset($_POST['s']))
{
	if ($_POST["s"]==1)
	{
		$tid=$_SESSION["tid"];
		$subjID=$_POST["sub"];
		echo "question for subject ".$subjID." to be entered below <BR>";
		$_SESSION['subjID']=$subjID;
		echo "<h1>hi</h1>";
		$myfile = fopen("Book1.csv", "r") or die("Unable to open file!");
		if(!feof($myfile)) {
			$strr=fgets($myfile);
			$xx=explode('#',$strr);
			$iii=1;
			foreach($xx as $a)
			{
				echo $iii."[".$a."]<BR>";
				if($iii==4){
					$quest=$a;
					//echo "HIT".$quest."...";
				}
				else if($iii==5){
					$selected1=$selected2=$selected3="";
					if (
				}
				$iii=$iii+1;
			}
			echo "<HR>";
			
		}
		fclose($myfile);

		
		?>
        <form method="post" enctype="multipart/form-data" action="addquestions_orig.php">
        <input type=hidden name=s value=2>
           
          <p>
            <label for="textarea">Enter Question:</label>
            <textarea name="question" id="textarea"><?php echo $quest?></textarea>
           
            
          </p>
        
          Please select Type of question:
          <select name="type">
          
          <option>MCQ(Single/Multiple)</option>
          <option>True/False</option>
          <option>Value Entry</option>
          </select>
          <p>Image Present:
            <label>
              <input type="radio" name="RadioGroup1" value="Yes" id="RadioGroup1_0">
              Yes
            </label>
            
            <label>
              <input type="radio" name="RadioGroup1" value="No" id="RadioGroup1_1" checked>
              No</label>
            
          </p>
          <p>
            <label for="fileField">File:</label>
            <input type="file" name="fileField" id="fileField">
          </p>
          <p>
            <label for="textfield">Option 1:</label>
            <input type="text" name="option1" id="textfield">
           
            <label for="textfield">Option 2:</label>
            <input type="text" name="option2" id="textfield">
           </p>
           <p>
            <label for="textfield">Option 3:</label>
            <input type="text" name="option3" id="textfield">
           
            <label for="textfield">Option 4:</label>
            <input type="text" name="option4" id="textfield">
           </p><p>
            <label for="textfield">Option 5:</label>
            <input type="text" name="option5" id="textfield">
           
            <label for="textfield">Option 6:</label>
            <input type="text" name="option6" id="textfield">
           </p>
           <p>
            <label for="textfield">Option 7:</label>
            <input type="text" name="option7" id="textfield">
           
            <label for="textfield">Option 8:</label>
            <input type="text" name="option8" id="textfield">
           </p><p>
            <label for="textfield">Option 9:</label>
            <input type="text" name="option9" id="textfield">
           
            <label for="textfield">Option 10:</label>
            <input type="text" name="option10" id="textfield">
           </p>
           <p>
             <label for="textfield2">Correct Answer(eg: 1,2,3):</label>
             <input type="text" name="correctans" id="textfield2">
          </p>
           <p>
             <input type="submit" name="submit2" id="submit2" value="Submit">
           </p>
           
        </form>
<?php
	}
	}

?>