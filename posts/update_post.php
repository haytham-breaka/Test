<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_request_method($_SERVER['REQUEST_METHOD'], ['GET']);
	authenticate(['admin']);

	if (!isset($_GET['status']) || ($_GET['status'] != "Approved" && $_GET['status'] != "Rejected")) {
		redirect_to('http://localhost/webproject/admin/show_pending_posts.php?page=0');
	}
	$post_id = $_GET['id'];
	$status = $_GET['status'];
	connect_to_db('aast');

	$query = "UPDATE post SET status = '$status' WHERE id = $post_id";
	mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
	
	redirect_to('http://localhost/webproject/admin/show_pending_posts.php?page=0');
?>