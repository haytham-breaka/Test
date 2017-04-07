<?php
	$title = "Students Grade";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/functions.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_self_only('professor', $_SESSION['current_user']['id']);

	connect_to_db('aast');
	$student_id = $_POST["id"];
	$grade = rawurldecode($_POST["grade"]);
	$code = $_POST["code"];
	$query = "UPDATE take
			  SET Grade = '$grade'
			  WHERE SREG = $student_id AND CCode = '$code'";
	mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
?>
