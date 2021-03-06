<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Pie Chart Demo (LibChart)- http://codeofaninja.com/</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>

<?php
	//include the library
	include "libchart/libchart/classes/libchart.php";

	//new pie chart instance
	$chart = new PieChart( 500, 300 );

	//data set instance
	$dataSet = new XYDataSet();
	
	//actual data
	//get data from the database
	
	//include database connection
	include 'db_connect.php';

	//query all records from the database
	$query = "select * from programming_languages";

	//execute the query
	$result = $mysqli->query( $query );

	//get number of rows returned
	$num_results = $result->num_rows;

	if( $num_results > 0){
	
		while( $row = $result->fetch_assoc() ){
			extract($row);
			$dataSet->addPoint(new Point("{$name} {$ratings})", $ratings));
		}
	
		//finalize dataset
		$chart->setDataSet($dataSet);

		//set chart title
		$chart->setTitle("Tiobe Top Programming Languages for June 2012");
		
		//render as an image and store under "generated" folder
		$chart->render("generated/1.png");
	
		//pull the generated chart where it was stored
		echo "<img alt='Pie chart'  src='generated/1.png' style='border: 1px solid gray;'/>";
	
	}else{
		echo "No programming languages found in the database.";
	}
?>

</body>
</html>
