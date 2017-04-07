<?php
require_once(dirname(__FILE__). '/functions.php');

connect_to_db("aast");

$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$gpa = $_POST["gpa"];
$term = $_POST["term"];
$achievedhours = $_POST["achievedhours"];
$department = $_POST["department"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = "INSERT INTO student (SFNAME, SMNAME, SLNAME, SGPA, STerm, SAchvdHrs, SDepID, Email, Password)
VALUES ('$firstname', '$middlename', '$lastname', $gpa, $term, $achievedhours, '$department', '$email', '$password')";

$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

add_notice("Registered Successfully!");
redirect_to(GUI_REGISTER_STUDENT_URL);
?>
