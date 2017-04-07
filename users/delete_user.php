<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_request_method($_SERVER['REQUEST_METHOD'], ['GET']);
	authenticate_self(['admin']);

	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	    $table_name = $_GET['table'];
	    $user_id = $_GET['id'];
	    connect_to_db('aast');
	    $query = "DELETE from $table_name where id= $user_id";
		mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		redirect_to('http://localhost/webproject/admin/show_'.$table_name.'s.php?page='.$_GET['page']);
	}
?>