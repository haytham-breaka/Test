<?php
	$title = "My Posts";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_self_only("student", $_SESSION['current_user']['id']);
?>

<div id="show_pending_posts" style="width:75%">
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$page = $_GET['page'];

		connect_to_db('aast');

		$records_per_page = 10;
		$start = $page * $records_per_page;

		$query = "SELECT id, title, status from post where stID=".$_SESSION['current_user']['id']." limit $start, $records_per_page";
		$posts = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

		$total_number_of_records_query = "SELECT COUNT(*) as total FROM post where status='Approved'";
		$total_number_of_records = mysql_query($total_number_of_records_query) or die(mysql_error());
		$total_number_of_records = mysql_fetch_array($total_number_of_records)['total'];

		echo "<h1 align= \"left\" style=\" color:#8B0000\"> Posts </h1>";
		echo "<table id='table12345555' class=\"table table-bordered table-inverse\">";
		echo "<thead>";
		echo "<tr>\n";
		echo "<th>ID</th>";
		echo "<th>Title</th>";
		echo "<th>Status</th>";
		echo "<th></th>";
		echo "</tr>\n";
		echo "</thead>";
		echo "<tbody>";
		while ($post = mysql_fetch_array($posts)) {
			echo "<tr>\n";
			echo "<td>".$post['id']."</td>";
			echo "<td>".$post['title']."</td>";
			echo "<td>".$post['status']."</td>";
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