<?php
	require_once 'php/functions.php';
	if (!session_id()) session_start();
	if (!isset($_SESSION['notices'])) $_SESSION['notices'] = array();
	if (!isset($_SESSION['errors'])) $_SESSION['errors'] = array();
?>

<!DOCTYPE html>
<html>
<head>
	<title> <?php the_title();?> </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/Stylesheet.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	 <div class="container">
	 &nbsp &nbsp &nbsp &nbsp
			<img class="img-responsive" src="1.PNG" style='float: left;' width="700" height="90"  hspace="50"> 
			<p style="color:#26619c;" id="demo" ></p>
	 </div>
	 <script>
		n =  new Date();
		y = n.getFullYear();
		m = n.getMonth() + 1;
		d = n.getDate();
		document.getElementById("demo").innerHTML = m + "-" + d + "-" + y;
	</script>

	<div id= "header" style="Background: #26619c;">
	
		<button class="btn btn-primary dropdown-toggle" type="button" style=" float:left; margin-left:180px;"> 
		<a style="color:white;" href="http://localhost/webproject/HomePage.php">Home</a>
		</button>
	
	
	<div class="dropdown" style="float: left; margin-left:50px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">About Us
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="http://localhost/webproject/VisionMission.php">Mission and Vision</a></li> 
      <li><a href="http://localhost/webproject/OverviewHeadquarters.php">Overview & Headquarters</a></li>
      <li><a href="http://localhost/webproject/CoreValues.php">Core Values</a></li>
	  <li><a href="http://localhost/webproject/AASTMTEnablers.php">AASTMT Enablers</a></li>
	  <li class="divider"></li>
	  <li><a href="http://localhost/webproject/FAQs.php">FAQs</a></li>
	  <li><a href="http://localhost/webproject/ContactUs.php">Contact Us</a></li>
    </ul>
    </div>
	
    <div class="dropdown" style="float: left; margin-left:50px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Education
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="http://localhost/webproject/CollegesDepartments.php">Colleges and Departments</a></li>
      <li><a href="http://localhost/webproject/DegreesOffered.php">Degrees Offered</a></li>
      <li><a href="http://localhost/webproject/ProgramCourses.php">Programs & courses</a></li>
    </ul>
    </div>
		
	<div class="dropdown" style="float: left; margin-left:50px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Admission
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="http://localhost/webproject/Overview.php">Overview</a></li>
      <li><a href="http://localhost/webproject/CollegesBacholorDegree.php">Colleges and Bacholor Degree</a></li>
      <li><a href="http://localhost/webproject/GraduatesDegree.php">Graduate Degrees</a></li>
	  <li><a href="http://localhost/webproject/RegistrationRules.php">Regestiration Rules</a></li>
    </ul>
    </div>

	<div class="dropdown" style="float: left; margin-left:50px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Campus Life
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
	  <li class="dropdown-header">Campuses</li>
      <li><a href="http://localhost/webproject/AASTMTCampuses.php">AASTMT Campuses</a></li>
	  <li class="dropdown-header">Jobs and Careers</li>
      <li><a href="http://localhost/webproject/JobsCareers.php">Job Opportunities</a></li>
	  	  <li class="dropdown-header">Studens' Life</li>
      <li><a href="http://localhost/webproject/Communities.php">Communities</a></li>
    </ul>
    </div>
	
    <div class="dropdown" style="float: left; margin-left:50px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">News & Media
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
	  <li class="dropdown-header">News and Events</li>
      <li><a href="http://localhost/webproject/AASTToday.php">AASTMT Today</a></li>
    </ul>
    </div>
	
	<?php
		echo "<div  style=\"float: left; margin-left:50px;\">";
			$_SESSION['return_to'] = "http://localhost".$_SERVER['REQUEST_URI'];
			if (is_loggedin()) {
				echo "<div style='float:right;'>
						<button class='btn btn-primary dropdown-toggle' type='button'> 
						<a style='color:white;' href=".HOME_URL.">".fullname()."</a>
						</button> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
						<button class='btn btn-primary dropdown-toggle' type='button'> 
						<a style='color:white;' href=".LOGOUT_URL."> Logout </a>
						</button><br>
					 </div>";
			} else if ($_SESSION['return_to'] != GUI_LOGIN_URL) {
				echo "<div style='float:right;'>
						<button class='btn btn-primary dropdown-toggle' type='button'> 
						<a style='color:white;' href=".GUI_LOGIN_URL.">Sign in</a>
						</button><br>
					 </div>";
			}
		echo "</div>";
		echo "<br> <br> ";
		echo "</div>";
		$noteslength = count($_SESSION['notices']);
		if ($noteslength > 0) {
			echo "<div class=\"panel panel-success\" id=\" notices\">";
				echo "<div class=\"panel-heading\">";
					for($x = 0; $x < $noteslength; $x++) {
						echo $_SESSION['notices'][$x];
						if ($x + 1 < $noteslength) {
							echo "<br>";
						}
					}
				echo "</div>";
			echo "</div>";
		}

		$errorslength = count($_SESSION['errors']);
		if ($errorslength > 0) {
			echo "<div class=\"panel panel-danger\" id=\" errors\">";
				echo "<div class=\"panel-heading\">";
					for($x = 0; $x < $errorslength; $x++) {
						echo $_SESSION['errors'][$x];
						if ($x + 1 < $errorslength) {
							echo "<br>";
						}
					}
				echo "</div>";
			echo "</div>";
		}
		clear_errors_and_notices();
	?>
	
	
