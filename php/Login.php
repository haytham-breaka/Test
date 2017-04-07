<?php
require_once(dirname(__FILE__). '/functions.php');

connect_to_db("aast");

$email = $_POST["email"];
$password = $_POST["password"];

$query = "SELECT * from student where email = '$email' ";
$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
$role = "student";
if(mysql_num_rows($user) == 0){
	$query = "SELECT * from professor where email = '$email' ";
	$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
	$role = "professor";
	if(mysql_num_rows($user) == 0){
		$query = "SELECT * from admin where email = '$email' ";
		$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		$role = "admin";
		if (mysql_num_rows($user) == 0) {
			$role = "";
		}
	}
} 


$row = mysql_fetch_array($user);

if($password == $row["password"]){
	$_SESSION['current_user'] = $row;
	$_SESSION[$role] = true;
	$_SESSION['loggedin'] = true;
	$_SESSION['Notes'] = "Logged in Successfully!";
	$inactive = 7200;
	$_SESSION['expire_current_user'] = time() + $inactive;
	add_notice("Logged in Successfully!");
	redirect_to(HOME_URL);
}
else {
	add_error("Invalid Email or Password");
	redirect_to(GUI_LOGIN_URL);
}

?>
