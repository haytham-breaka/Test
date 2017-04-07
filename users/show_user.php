<?php
	$title = "Show Info";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_request_method($_SERVER['REQUEST_METHOD'], ['GET']);
	authenticate_self(['admin']);
?>

<?php 	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	    $table_name = $_GET['table'];
	    $user_id = $_GET['id'];

	    connect_to_db('aast');

	    $query = "SELECT * from $table_name where id = $user_id";
		$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		$user = mysql_fetch_array($user);
		if($user == 0){
			echo "No such a user.";
		} else {
			echo "<h1 align= \"left\" style=\" color:#8B0000\"> Personal Details </h1>";
			echo '<img src= "data:image/jpeg; base64,'.base64_encode( $user['photo'] ).'" width="150" height="150"/> ';
			echo "<a href= ".GUI_EDIT_USER_INFO_URL."?table=".$table_name."&id=".$user['id']." class=\"btn btn-danger btn-lg active\" role=\"button\" > Edit Information </a>";
			echo "<table id='table124' class=\"table table-bordered table-inverse\">";

			foreach ($user as $k => $v) {
				if (!is_numeric($k) && $k != "photo") {
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