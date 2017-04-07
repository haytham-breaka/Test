<?php
require_once(dirname(__FILE__). '/config.php');

session_start();

function the_title() {
	global $title;
	echo $title;
}

function home_url() {
	echo 'HOME_URL';
}

function redirect_to($url) {
	header("Location: ".$url);
	exit();
}

function connect_to_db($db_name) {
	$db = mysql_connect("localhost", "root", "");
	if (!$db) {
		add_error("Error - Could not connect to MySQL");
		exit;
	}
		// Select my database
	$er = mysql_select_db($db_name);
	if (!$er) {
		add_error("Error - Could not select ".$db_name." database");
		exit;
	}
}

function add_error($error) {
	$_SESSION['errors'][] = $error;
}


function add_notice($notice) {
	$_SESSION['notices'][] = $notice;
}

function clear_errors_and_notices() {
	$_SESSION['notices'] = array();
	$_SESSION['errors'] = array();
}

function fullname() {
	$role = get_role();
	if (get_role() == $role) {
		if($role == "student")
			return $_SESSION['current_user']['SFName']." ".$_SESSION['current_user']['SLName'];
		else
			return $_SESSION['current_user']['Name'];
	}
	else if ($role != "no_role"){
		return $_SESSION['current_user']['Name'];
	}
}

function is_loggedin() {
	return isset($_SESSION['loggedin']);
}

function get_role() {
	if (isset($_SESSION['admin'])) return "admin";
	if (isset($_SESSION['professor'])) return "professor";
	if (isset($_SESSION['student'])) return "student";
	return "no_role";
}

?>