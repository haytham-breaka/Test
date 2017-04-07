<?php
	$title = "Admins";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate(['admin']);
?>
<div id="show_admins" style="width:500px">
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$page = $_GET['page'];

		connect_to_db('aast');

		$records_per_page = 10;
		$start = $page * $records_per_page;

		$query = "SELECT id, Name, email from admin limit $start, $records_per_page";
		$users = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

		$total_number_of_records_query = "SELECT COUNT(*) as total FROM admin;";
		$total_number_of_records = mysql_query($total_number_of_records_query) or die(mysql_error());
		$total_number_of_records = mysql_fetch_array($total_number_of_records)['total'];

		echo "<h1 align= \"left\" style=\" color:#8B0000\"> Admins </h1>";
		echo "<table id='table9' class=\"table table-bordered table-inverse\">";
		echo "<thead>";
		echo "<tr>\n";
		echo "<th>ID</th>";
		echo "<th>Name</th>";
		echo "<th>Email</th>";
		echo "<th></th>";
		echo "</tr>\n";
		echo "</thead>";
		echo "<tbody>";
		while ($user = mysql_fetch_array($users)) {
			echo "<tr>\n";
			echo "<td>".$user['id']."</td>";
			echo "<td>".$user['Name']."</td>";
			echo "<td>".$user['email']."</td>";
			echo "<td> <a href= ".SHOW_USER_URL."?table=admin&id=".$user['id']." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" > Show </a> <a href= ".GUI_EDIT_USER_INFO_URL."?table=admin&id=".$user['id']." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" > Edit </a>"; if ($_SESSION['current_user']['id'] != $user['id']) {echo "<a href= ".DELETE_USER_URL."?table=admin&id=".$user['id']."&page=".$page." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" > Delete </a>";} echo"</td>";
			echo "</tr>\n";
		}
		echo "</tbody>";
		echo "</table>\n";
		$prev_page = $page-1;
		$next_page = $page+1;
		if ($prev_page >= 0) {
			echo "<a href= ".SHOW_ADMINS_URL."?page=".$prev_page." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" > Prev Page </a> &nbsp;";
		}
		if ($start + $records_per_page < $total_number_of_records) {
			echo "<a href= ".SHOW_ADMINS_URL."?page=".$next_page." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\" > Next Page </a>";
		}
	}
?>
</div>

<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Footer.php');
?>