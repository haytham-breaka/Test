<?php
	$title = "Show Post";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_request_method($_SERVER['REQUEST_METHOD'], ['GET']);
	#authenticate_self(['loggedin']);
?>

<?php 	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	    $course_code = $_GET['Code'];

	    connect_to_db('aast');

	    $query = "SELECT * from course where Code = $course_code";
		$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		$user = mysql_fetch_array($user);
		if($user == 0){
			echo "No such a course.";
		} else {
			echo "<h1 align= \"left\" style=\" color:#8B0000\"> Course Details </h1>";
			echo "<table id='table234' class=\"table table-bordered table-inverse\">";
			foreach ($user as $k => $v) {
				if (!is_numeric($k)) {
					echo "<tr>\n";
					echo "<td>$k</td>";
					echo "<td>$v</td>"; 
					echo "</tr>\n";
				}
			}
			echo "</table>\n";
		}
	}
?>

<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Footer.php');
?>