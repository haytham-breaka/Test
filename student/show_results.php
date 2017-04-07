<?php
	$title = "Show Results";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_request_method($_SERVER['REQUEST_METHOD'], ['GET']);
	authenticate(['student']);
?>

<?php 	
	
	    $student_id = $_SESSION['current_user']['id'];

	    connect_to_db('aast');

	    $query = "SELECT CCode, Grade from take where SReg = $student_id";
		$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		
		echo "<div id = \" st_results \">";
		echo "<h1 align= \"left\" style=\" color:#8B0000\"> Results </h1>";
		echo "<table id='table1' class=\"table table-bordered table-inverse\">";
		echo "<thead>";
		echo "<tr>\n";
		echo "<th>Course Code</th>";
		echo "<th>Course Name</th>";
		echo "<th>Grade</th>";
		echo "</tr>\n";
		echo "</thead>";
		echo "<tbody>";
		while ($resul = mysql_fetch_array($result)) {
			$curr_course_code = $resul['CCode'];
			$query2 = "SELECT CName from course where Code = $curr_course_code ";
			$course_name = mysql_query($query2) or die ("Couldn’t execute query. " . mysql_error());
			$course_name = mysql_fetch_array($course_name);
			echo "<tr>\n";
			echo "<td>".$resul['CCode']."</td>";
			echo "<td>".$course_name['CName']."</td>";
			echo "<td>".$resul['Grade']."</td>";
			echo "</tr>\n";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";

?>

<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Footer.php');
?>