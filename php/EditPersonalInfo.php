<?php
require_once(dirname(__FILE__). '/functions.php');

$table_name = $_POST['table'];
$user_id = $_POST['id'];
echo $table_name." ".$user_id;
connect_to_db('aast');

if($table_name == "student"){
	$firstname = $_POST["firstname"];
	$middlename = $_POST["middlename"];
	$lastname = $_POST["lastname"];
	
	$term = $_POST["term"];
	$achievedhours = $_POST["achievedhours"];
	$department = $_POST["department"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	if (get_role() == "admin") {
		$gpa = $_POST["gpa"];
		$query = "UPDATE student
		SET SFNAME = '$firstname', SMNAME = '$middlename', SLNAME = '$lastname', SGPA = $gpa, STerm = $term, SAchvdHrs = $achievedhours, SDepID = '$department', Email = '$email', Password = '$password'
		WHERE id = $user_id";
	} else {
		$query = "UPDATE student
		SET SFNAME = '$firstname', SMNAME = '$middlename', SLNAME = '$lastname', STerm = $term, SAchvdHrs = $achievedhours, SDepID = '$department', Email = '$email', Password = '$password'
		WHERE id = $user_id";
	}
}
else if($table_name == "admin"){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$query = "UPDATE admin
	SET NAME = '$name', Email = '$email', Password = '$password'
	WHERE id = $user_id";
}
else if($table_name == "professor"){
	$name = $_POST["name"];
	$department = $_POST["department"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$query = "UPDATE professor 
	SET NAME = '$name', PDepID = '$department', Email = '$email', Password = '$password'
	WHERE id = $user_id";
}

$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

add_notice("Updated Successfully!");
redirect_to(HOME_URL);
?>
