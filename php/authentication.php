<?php
require_once(dirname(__FILE__). '/functions.php');

function authenticate_request_method($request_meth, $needed_meth) {
	$arrlength = count($needed_meth);
	for($x = 0; $x < $arrlength; $x++) {
		if ($needed_meth[$x] == $request_meth) {
			return ;
		}
	}
	add_error("Rejected request method!");
	redirect_to(HOME_URL);
}

function authenticate_self_only($table_name, $user_id){
	if ($table_name == get_role() && $user_id == $_SESSION['current_user']['id']) {
		return;
	}
	add_error("Access Denied!");
	redirect_to(HOME_URL);
}

function authenticate_self($to_auth){
	$table_name = $_GET['table'];
	$user_id = $_GET['id'];
	if ($table_name == get_role() && $user_id == $_SESSION['current_user']['id']) {
		return;
	}
	authenticate($to_auth);
}

# loggedin, loggedout, professor, student, admin
function authenticate($to_auth){
	if(isset($_SESSION['expire_current_user']) && time() > $_SESSION['expire_current_user'])
	{  
		session_destroy();
		add_notice("Session timed out!");
		$_SESSION['loggedout'] = true;
		redirect_to(GUI_LOGIN_URL);
	}

	$arrlength = count($to_auth);

	if ($arrlength == 1 && $to_auth[0] == "loggedout" ) {
	 	if (isset($_SESSION['loggedin'])) {
	 		add_error("You are already logged in!");
			redirect_to(HOME_URL);
	 	} else {
	 		return ;
	 	}
	}
	for($x = 0; $x < $arrlength; $x++) {
		if (isset($_SESSION[$to_auth[$x]])) {
			return ;
		}
	}

	if (isset($_SESSION['loggedin'])) {
		add_error("Access Denied!");
		redirect_to(HOME_URL);
	} else {
		add_error("You have to be logged in first!");
		redirect_to(GUI_LOGIN_URL);
	}
}

?>
