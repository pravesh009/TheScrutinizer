
<!DOCTYPE html>

<html class="no-js" lang="en">
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
 
$sql="DELETE FROM `result` WHERE 1";

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
<meta charset="utf-8" />
<title> Ebullient Enthusiasts</title>
<link rel="icon" href="img/Akshay1.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">



<!--FONTS-->

<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400,700">
<link	 href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
	
<!--CSS-->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/animate.css" />
<link rel="stylesheet" href="css/font-awesome.min.css" >
<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/cubeportfolio.min.css">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<script src="js/custom.modernizr.js"></script>
</head>

<body class="royal_loader">

	<!--HEADER-->
		<div id="header"> 
			<div class="col-sm-12 col-lg-12">
				<div class="row">
			<!--LOGO-->	
		<div id="logo">
			<a class="scroll" href="#home"><img src="img/Akshay1.jpg" alt="" width="100" height="100"/></a>
		</div>
			<!--//LOGO-->
		
		<!--MENU-->
			<ul id="menu">
				<li><a class="scroll" href="#home">Home</a></li>
				<li><a class="scroll" href="#about">About</a></li>
				<li><a class="scroll" href="#contact">Contact</a></li>
				<li><a href ="products.php">Products</a></li>
				<li><a href ="tp/reg/login.php">Members Login</a></li>
				
			</ul>
			<!--//MENU-->
		<!--RESPONSIVE TOGGLE-->
		<div id="nav-toggle">
			<i class="fa fa-bars"></i>
		</div>
	<!--//RESPONSIVE TOGGLE-->
		</div>
	</div>
		</div>
		<!--//HEADER-->
		
	<!--HOME SECTION STARTS-->
		<section id="home" class="wallpapered" 
		data-wallpaper-options='{"source":{
		"webm":"video/NycTrafficH264.webm",
		"mp4":"video/NycTrafficH264.mp4",
		"ogg":"video/NycTrafficH264.ogv",
		"poster":"video/home_image.jpg"}}'>
		<div class="video_overlay">	
		<!--ANIMATED TEXT-->	
		<div id="content">
			<!--<div class=" heart  wow bounceInDown" data-wow-duration="3s" data-wow-delay="7s"></div>-->
			<div class="byline wow slideInLeft pad30"  data-wow-delay="2s">Ebullient Enthusiasts</div>
			<h1 class="wow bounceInDown" data-wow-duration="3s" data-wow-delay="3s">Online Tests & Counsellors</h1>
			<div class="name wow bounceInDown" data-wow-duration="3s" data-wow-delay="5s">WELCOME.</div>
			<div class="text-center">
				<a href="#about" class="scroll">
				<i class="fa fa-caret-down fa-inverse fa-3x ilink  wow rotateIn " data-wow-duration="1s" data-wow-delay="8s"></i></a>
			</div>
		</div>	
			</div>	
		</section>
			<!--//HOME SECTION ENDS-->
			
	
	
	<!--ABOUT SECTION STARTS-->	
			<section id="about">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-lg-12">
						<h1 class="wow fadeInRightBig" data-wow-offset="80" data-wow-duration="2s">
								What We do
						</h1>
						
						<div class="lead wow fadeInRightBig" data-wow-offset="80" data-wow-duration="2s">
							Success is no accident. It is hard work, <strong>perseverance</strong>, learning, sacrifice and most of all, 
							<span class="colour"><strong>love</strong></span> of what you are doing or <span class="colour">learning</span> to do. 
						</div>
				
				<!--SERVICE 1-->	
				<div class="col-sm-4 col-lg-4 text-center wow fadeIn" data-wow-offset="80" data-wow-duration="2s" data-wow-delay="1s">
					<div class="service">
						<i class="fa fa-laptop"></i>
					</div>
					<h6>Online Test</h6>
						
				</div>
				
				<!--SERVICE 2-->
				<div class="col-sm-4 col-lg-4 text-center wow fadeIn" data-wow-offset="80" data-wow-duration="2s" data-wow-delay="1.5s">
					<div class="service">
						<i class="fa fa-bolt"></i>
					</div>
					<h6>Lightning Fast Results</h6>
					
				</div>
				
				<!--SERVICE 3-->
				<div class="col-sm-4 col-lg-4 text-center  wow fadeIn" data-wow-offset="80" data-wow-duration="2s" data-wow-delay="2s">
					<div class="service">
						<i class="fa fa-tasks"></i>
					</div>
					<h6>Test Series</h6>
					
				</div>
				
				<!--SERVICE 4-->	
				<div class="col-sm-4 col-lg-4 text-center wow fadeIn" data-wow-offset="80" data-wow-duration="2s" data-wow-delay="1s">
					<div class="service">
						<i class="fa fa-star"></i>
					</div>
					<h6>Brilliant</h6>
					
				</div>
				
				<!--SERVICE 5-->
				<div class="col-sm-4 col-lg-4 text-center wow fadeIn" data-wow-offset="80" data-wow-duration="2s" data-wow-delay="1.5s">
					<div class="service">
						<i class="fa fa-desktop"></i>
					</div>
					<h6>User Friendly Enviornment</h6>
					
				</div>
				
				<!--SERVICE 6-->
				<div class="col-sm-4 col-lg-4 text-center wow fadeIn" data-wow-offset="80" data-wow-duration="2s" data-wow-delay="1.5s">
					<div class="service">
						<i class="fa fa-lightbulb-o"></i>
					</div>
					<h6>Great Analysis</h6>
					
				</div>
				
				
			</div>
		</div>
			</div>			
		</section>
		<!--//ABOUT SECTION ENDS-->
		
		<!--I LIKE TICKER-->
		<section id="ticker">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-12">
						<h1 class="like wow fadeInRightBig" data-wow-offset="80" data-wow-duration="2s">We like<br> 
						<span class="ticker"></span></h1>
					</div>
				</div>
			</div>
		</section>
	<!--//WE LIKE TICKER-->
		
		
		<!--CHARTS--
			<section id="charts">
				<div class="well">
					<div class="dark_overlay">
				<div class="container">
			<h1 class="wow fadeIn" data-wow-offset="80" data-wow-duration="2s">
				My 	
			</h1>
			
		<!--1--
			<div class="col-sm-4 col-lg-4 text-center  pie wow bounceIn" data-wow-delay="1s">
				<span class="chart1">
			<span class="percent">75%</span>
				</span>
				<p class="center">Skill</p>
			</div>
		<!--2--	
			<div class="col-sm-4 col-lg-4 text-center bouncein pie wow bounceIn" data-wow-delay="1.5s">
				<span class="chart2">
			<span class="percent">80%</span>
				</span>
				<p class="center">CSS 3</p>
			</div>
			
			
			
				<!--3-->
			
			
			
		<!--4--	
			<div class="col-sm-4 col-lg-4 text-center bouncein pie wow bounceIn" data-wow-delay="2s">
				<span class="chart3">
			<span class="percent">95%</span>
				</span>
				<p class="center">HTML 5</p>
			</div>
		</div>
		<div class="pad30"></div>
		</div>
			</div>
		</section>
	<!--//CHARTS-->	
		
		<!--TEAM SECTION STARTS-->	
		<section id="team">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-lg-12">
				<h1 class="wow fadeInRightBig" data-wow-offset="80" data-wow-duration="2s">
					About Us
				</h1>
				
				<div class="lead  wow fadeInRightBig" data-wow-offset="80" data-wow-duration="2s">
					
					
					We create our own <strong>visual</strong> style ..  To let it be <strong><span class="colour"> unique</span></strong> for ourselves and yet identifiable to others.
				</div>
			</div>
		
		<div class="col-sm-12 col-lg-6">
			<p class="wow fadeIn" data-wow-offset="80" data-wow-duration="2s">
				 "Aptitude test are very important to identify the knowledge of person. They can prove helpful in deciding the right career path. 
				 The better the test, accurate would be the prediction result.
			</p>	
			<p>
			"General aptitude tests measures a broad spectrum of abilities.
			 With the result of this test career guidance system gives advice on their topic of expertise with techniques that 
			 support clients in making complex decisions and facing difficult situations. 
			 The focus of career guidance is generally on issues such as career exploration, career change, personal career development."
			</p>	
				</div>
		
		<div class="col-sm-12 col-lg-6">
			<p class="wow fadeIn" data-wow-offset="80" data-wow-duration="2s">
				"Our System deals with extracting data from the user given information and using it to 
				 predict trends and behaviour patterns, often the unknown event of interest is in the future."
			</p>
				</div>
			</div>
		</div>
		
				

			
<!--MILESTONES-->
	<section id="milestones">
		<div class="well">	
			<div class="dark_overlay">	
				<div class="container">
					<h1 class="wow fadeIn" data-wow-offset="80" data-wow-duration="2s">
						milestones
					</h1>
				<div class="pad45"></div>
				
				<!--COUNTERS-->
				<!--1-->
				<div class="col-sm-4 col-lg-4 text-center">
				<div class="counter wow bounceIn" data-wow-offset="80" data-wow-duration="2s">
					<div id="counter-1"></div>
						<p class="light">Test Taken</p>
					</div>	
						</div>
				<!--2-->
				<div class="col-sm-4 col-lg-4 text-center">
				<div class="counter wow bounceIn" data-wow-offset="80" data-wow-duration="2s">
					<div id="counter-2"> 81</div>
						<p class="light">seconds for each section</p>
					</div>
						</div>
				<!--3-->	
				<div class="col-sm-4 col-lg-4 text-center ">
				<div class="counter wow bounceIn" data-wow-offset="80" data-wow-duration="2s">
					<div id="counter-3"></div>
						<p class="light">Questions to practice</p>
					</div>
						</div>
						<!--//COUNTERS-->
					</div>
				</div>
			</div>
		</section>
	<!--//MILESTONES-->
	
	
			
		
	
	<!--//WORK SECTION ENDS-->
	
	
		

	

	
	

	
		<!--CONTACT SECTION STARTS-->
				<section id="contact">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-lg-12 ">
							
							<h1 class="wow fadeInRightBig" data-wow-offset="80" data-wow-duration="2s">
								Contact
							</h1>
							
							<div class="lead wow fadeInRightBig" data-wow-offset="80" data-wow-duration="2s">
								Sometimes <strong>magic</strong> is just someone <strong>spending</strong> more time on something than anyone else might reasonably expect.
							</div>
							
							<div class="row">
								<div class="col-sm-6 col-lg-6  wow fadeInUp" data-wow-offset="80" data-wow-duration="2s">
								
								<h2>Do you need a take a test yourself,<br>have a question or comment?</h2> 
								
								
						
								
								<ul class="fa-ul">
									<li><i class="fa-li fa fa-phone inverse"></i> <span class="inverse">+91 9860215008</span></li>
									<li><i class="fa-li fa fa-envelope inverse"></i> <a href="mailto:#">ebullient@somaiya.edu</a></li>
									
									
								</ul>
								
								<ul class="social-icons">
									<li class="wow fadeIn" data-wow-offset="80" data-wow-duration="2s">
										<a href="http://www.twitter.com/AJCasts" target="_blank"><i class="fa fa-twitter"></i></a>
									</li>
									<li class="wow fadeIn" data-wow-offset="80" data-wow-duration="2s" data-wow-delay="0.5s">
										<a href="http://www.facebook.com/powerP913"><i class="fa fa-facebook"></i></a>
									</li>
									
									
									
								
							</ul>
						</div>
						
						<div class="col-sm-6 col-lg-6  wow fadeInUp" data-wow-offset="80" data-wow-duration="2s">
						<div class="contact_form">  
							<div id="note"></div>
							<div id="fields">
							<form id="ajax-contact-form">
							<input class="col-xs-12 col-md-12" type="text" name="name" value="" placeholder="Name" />
							<input class="col-xs-12 col-md-12" type="text" name="email" value="" placeholder="Email"/>
							<input class="col-xs-12 col-md-12" type="text" name="subject" value="" placeholder="Subject"  />
							<textarea name="message" id="message" class="col-xs-12  col-md-12" placeholder="Message"></textarea>
							<div class="clear"></div>
							<input type="submit" class="btn marg-right10" value="submit" />
							<input type="reset" class="btn" value="reset" />
							<div class="clear"></div>
							</form>  
						</div>
					</div> 
				<!-- // End FORM -->	
				</div>
			</div>
		</div>
			</div>
				</div>
					<div class="pad60"></div>
						</section>
							<!--//END CONTACT SECTION--> 
							
							<!--START FOOTER--> 		
								<footer>			
									
								
								<div class="center footer">
								<!-- UP TO TOP -->	
									<div class="wow bounce" data-wow-offset="80" data-wow-duration="2s">
										<a href="#home" class=" scroll">
											<span class="fa-stack fa-lg">
												<i class="fa fa-circle fa-stack-2x "></i>
												<i class="fa fa-angle-double-up fa-stack-1x fa-inverse"></i>
											</span></a>
										</div>
									
									<div id="copyright" class="wow bounceIn" data-wow-offset="80" data-wow-duration="2s">&copy; 2016 Ebullient Enthusiasts
									<br>
									
								</div>
							</div>
						</footer>
					<!--//END--> 
 
<!--SCRIPTS--> 
	<script src="js/jquery.js"></script>
	<script src="js/retina.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/royal_preloader.min.js"></script>
	<script src="js/smooth-scroll.js"></script>
	<script src="js/jquery.appear.js"></script>	
	<script src="js/parallax.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/count.js"></script>
	<script src="js/charts.js"></script>
	<script src="js/jquery.cubeportfolio.min.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="js/gmap3.min.js" type="text/javascript"></script>
	<script src="js/scripts.js"></script>
	
<script type="text/javascript" src="js/jquery.fs.wallpaper.js"></script>
<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() {
	$(".wallpapered").wallpaper();
	});
//]]>
</script>	

<script src="js/owl.carousel.min.js"></script>
	<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() {
    		$("#clients").owlCarousel({
				autoPlay: 3000, //Set AutoPlay to 3 seconds
				items : 4,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]
			});
		});
	//]]>
</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64759230-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
