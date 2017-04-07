<?php
	$title = "Courses";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_self_only('professor', $_SESSION['current_user']['id']);
?>

<div id="show_pending_posts" style="width:75%">
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$page = $_GET['page'];

		connect_to_db('aast');

		$records_per_page = 10;
		$start = $page * $records_per_page;

		$query = "SELECT Code, CName, term, depID from course where profID = ".$_SESSION['current_user']['id']." limit $start, $records_per_page";
		$courses = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

		$total_number_of_records_query = "SELECT COUNT(*) as total FROM course where profID = ".$_SESSION['current_user']['id'];
		$total_number_of_records = mysql_query($total_number_of_records_query) or die(mysql_error());
		$total_number_of_records = mysql_fetch_array($total_number_of_records)['total'];

		echo "<h1 align= \"left\" style=\" color:#8B0000\"> Posts </h1>";
		echo "<table id='table12345555' class=\"table table-bordered table-inverse\">";
		echo "<thead>";
		echo "<tr>\n";
		echo "<th>Course Code</th>";
		echo "<th>Course Name</th>";
		echo "<th>Term</th>";
		echo "<th>Department</th>";
		echo "<th></th>";
		echo "</tr>\n";
		echo "</thead>";
		echo "<tbody>";
		while ($course = mysql_fetch_array($courses)) {
			echo "<tr>\n";
			echo "<td>".$course['Code']."</td>";
			echo "<td>".$course['CName']."</td>";
			echo "<td>".$course['term']."</td>";
			$query = "SELECT DName from department where DepId=".$course['depID'];
			$department = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
			echo "<td>";
			if ($department = mysql_fetch_array($department)) {
				echo $department['DName'];
			}
			echo "</td>";

			echo "<td> <a href= ".STUDENTS_OF_COURSE_URL."?page=0&code=".$course['Code']." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" > Students of this course </a> </td>";
			echo "</tr>\n";
		}
		echo "</tbody>";
		echo "</table>\n";
		$prev_page = $page-1;
		$next_page = $page+1;
		if ($prev_page >= 0) {
			echo "<a href= ".PROF_COURSE_URL."?page=".$prev_page." class=\"btn btn-danger btn-lg active \" role=\"button\" > Prev Page </a> &nbsp;";
		}
		if ($start + $records_per_page < $total_number_of_records) {
			echo "<a href= ".PROF_COURSE_URL."?page=".$next_page." class=\"btn btn-danger btn-lg active \" role=\"button\" > Next Page </a>";
		}
	}
?>
</div>

<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Footer.php');
?>