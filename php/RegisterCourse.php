<?php
require_once(dirname(__FILE__). '/functions.php');

connect_to_db("aast");

$selected_courses_codes = $_POST["courses"];
$cancel_courses_codes = $_POST["cancel"];
$st_id = $_SESSION['current_user']['id'];


foreach($cancel_courses_codes as $code){
	$query = "DELETE from take where SReg = $st_id AND CCode = $code";
	$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
	add_notice("You have uregistered $code successfully!");
}

$query = "SELECT * from take where SReg = $st_id ";
$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

if(mysql_num_rows($result) == 6){
	add_notice("You have reached maximum limit of subjects per term!");
}
else {
	foreach($selected_courses_codes as $code){
	$query = "SELECT * from take where SReg = $st_id AND CCode = $code";
	$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		if(mysql_num_rows($result) == 0){
			$query = "INSERT INTO take (SReg, CCode)
			VALUES ($st_id, $code)";
			$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
			add_notice("You have registered $code successfully!");
		}
		else {
			$query = "SELECT CName from course where Code = $code";
			$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
			$result = mysql_fetch_array($result);
			add_notice("You have already registered ".$result['CName']." before!");
		}
	}
}

redirect_to(HOME_URL);
?>
