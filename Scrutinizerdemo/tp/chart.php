<!DOCTYPE html>
<html>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ebullient Enthusiasts</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
	<link rel="icon" href="assets/img/img.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- STYLE SWITCHER  CSS -->
<link href="assets/css/styleSwitcher.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />  
     <!--GREEN STYLE VERSION IS BY DEFAULT, USE ANY ONE STYLESHEET FROM TWO STYLESHEETS (green or red) HERE-->
     <link href="assets/css/themes/green.css" id="mainCSS" rel="stylesheet" />   
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>
<body >
 <div class="navbar navbar-inverse navbar-fixed-top move-me" id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><img class="logo-custom" src="assets/img/img.png" alt="test.html"  /></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="../index.php">HOME</a></li>
                     <li><a href="../index.php#about">ABOUT</a></li>
					 <li><a href="../index.php#contact">CONTACT</a></li>
                     <li><a href="../products.php">PRODUCTS</a></li>
                     <li><a href="mailto:kamal.vora@somaiya.edu?Subject=Product%20Enquiry" target="_top"> <i class="fa fa-envelope-o"></i><span class="home-mail">e-mail: kamal.vora@somaiya.edu</span></a></li>
                </ul>
            </div>
           
        </div>
    </div>
	<br>
	<br>
	<br>
<?php
$con=mysql_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$db = mysql_select_db("questions", $con);

$sql="DELETE FROM `test` WHERE 1";

$result1=mysql_query($sql);
	//ECHO $result;
	if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
	}
  
$sql= "ALTER TABLE `test`
auto_increment = 1";

$result1=mysql_query($sql);
	//ECHO $result;
	if (!mysql_query($sql)) {
  die('Error: ' . mysql_error($con));
}
mysql_close($con);
?>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>amCharts tutorial: Loading external data</title>
</head>
<body>

  <!-- prerequisites 
  <link rel="stylesheet" href="http://www.amcharts.com/lib/style.css" type="text/css">-->
  <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
  <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>

  <!-- cutom functions -->
  <script>
AmCharts.loadJSON = function(url) {
  // create the request
  if (window.XMLHttpRequest) {
    // IE7+, Firefox, Chrome, Opera, Safari
    var request = new XMLHttpRequest();
  } else {
    // code for IE6, IE5
    var request = new ActiveXObject('Microsoft.XMLHTTP');
  }

  // load it
  // the last "false" parameter ensures that our code will wait before the
  // data is loaded
  request.open('GET', url, false);
  request.send();

  // parse adn return the output
  return eval(request.responseText);
};
  </script>

  <!-- chart container -->
  <div id="chartdiv" style="width: 600px; height: 300px;"></div>

  <!-- the chart code -->
  <script>
var chart;

// create chart
AmCharts.ready(function() {

  // load the data
  var chartData = AmCharts.loadJSON('data.php');

  // SERIAL CHART
  chart = new AmCharts.AmSerialChart();
  chart.pathToImages = "http://www.amcharts.com/lib/images/";
  chart.dataProvider = chartData;
  chart.categoryField = "result_id";
  //chart.dataDateFormat = "YYYY-MM-DD";

  // GRAPHS

  var graph1 = new AmCharts.AmGraph();
  graph1.valueField = "marks";
  graph1.bullet = "round";
  graph1.bulletBorderColor = "#FFFFFF";
  graph1.LineColor="#444444";
  graph1.bulletBorderThickness = 2;
  graph1.lineThickness = 2;
  graph1.lineAlpha = 0.5;
  chart.addGraph(graph1);

  var graph2 = new AmCharts.AmGraph();
  graph2.valueField = "diff_level";
  graph2.bullet = "round";
  graph2.bulletBorderColor = "#FFFFFF";
  graph2.bulletBorderThickness = 2;
  graph2.lineThickness = 2;
  graph2.lineAlpha = 0.5;
  chart.addGraph(graph2);

  // CATEGORY AXIS
  //chart.categoryAxis.parseDates = true;

  // WRITE
  chart.write("chartdiv");
});

  </script>

</body>
</html>