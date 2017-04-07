<?php
	$title = "Pending Posts";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate(['admin']);
?>

<div id="show_pending_posts" style="width:75%">
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$page = $_GET['page'];

		connect_to_db('aast');

		$records_per_page = 10;
		$start = $page * $records_per_page;

		$query = "SELECT id, title, stID from post where status='pending' limit $start, $records_per_page";
		$posts = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

		$total_number_of_records_query = "SELECT COUNT(*) as total FROM post where status='pending'";
		$total_number_of_records = mysql_query($total_number_of_records_query) or die(mysql_error());
		$total_number_of_records = mysql_fetch_array($total_number_of_records)['total'];

		echo "<h1 align= \"left\" style=\" color:#8B0000\"> Posts </h1>";
		echo "<table id='table12345555' class=\"table table-bordered table-inverse\">";
		echo "<thead>";
		echo "<tr>\n";
		echo "<th>ID</th>";
		echo "<th>Title</th>";
		echo "<th>Student Name</th>";
		echo "<th></th>";
		echo "</tr>\n";
		echo "</thead>";
		echo "<tbody>";
		while ($post = mysql_fetch_array($posts)) {
			echo "<tr>\n";
			echo "<td>".$post['id']."</td>";
			echo "<td>".$post['title']."</td>";
			$query = "SELECT SFName, SLName from student where id=".$post['stID'];
			$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
			$student_name = "";
			echo "<td>";
			if ($user = mysql_fetch_array($user)) {
				$student_name = $user['SFName']." ".$user['SLName'];
				 echo "<a href= ".SHOW_USER_URL."?table=student&id=".$post['stID'].">".$student_name."</a>";
			}
			echo "</td>";
			echo "<td> <a href= ".SHOW_POST_URL."?id=".$post['id']." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" > Show </a> </td>";
			echo "</tr>\n";
		}
		echo "</tbody>";
		echo "</table>\n";
		$prev_page = $page-1;
		$next_page = $page+1;
		if ($prev_page >= 0) {
			echo "<a href= ".SHOW_STUDENTS_URL."?page=".$prev_page." class=\"btn btn-danger btn-lg active \" role=\"button\" > Prev Page </a> &nbsp;";
		}
		if ($start + $records_per_page < $total_number_of_records) {
			echo "<a href= ".SHOW_STUDENTS_URL."?page=".$next_page." class=\"btn btn-danger btn-lg active \" role=\"button\" > Next Page </a>";
		}
	}
?>
</div>

<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Footer.php');
?>