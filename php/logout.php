<?php
	$title = "Login";
	require_once '/functions.php';
	require_once(dirname(__FILE__). '/authentication.php');
	authenticate(['loggedin']);
	
	session_unset(); 
	session_destroy(); 

	redirect_to("http://localhost/webproject/HomePage.php");
?>
