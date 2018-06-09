<?php
$myfile = fopen("Book1.csv", "r") or die("Unable to open file!");
while(!feof($myfile)) {
$str=fgets($myfile);
$x=explode('#',$str);
foreach($x as $a)
	echo "[".$a."]<BR>";
echo "<HR>";
}
fclose($myfile);
?>