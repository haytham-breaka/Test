<?php
	$title = "Show Post";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_request_method($_SERVER['REQUEST_METHOD'], ['GET']);
	#authenticate_self(['student']);
?>

<?php 	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	    $table_name = $_GET['table'];
	    $training_ID = $_GET['TrID'];

	    connect_to_db('aast');

	    $query = "SELECT * from $table_name where TrID = $training_ID";
		$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		$user = mysql_fetch_array($user);
		if($user == 0){
			echo "No such a training.";
		} else {
			echo "<h1 align= \"left\" style=\" color:#8B0000\"> Training Details </h1>";
			echo "<table id='table333' class=\"table table-bordered table-inverse\">";
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