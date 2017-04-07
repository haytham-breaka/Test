<?php
require_once(dirname(__FILE__). '/functions.php');

connect_to_db("aast");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

$query = "INSERT INTO admin (NAME, Email, Password)
VALUES ('$name', '$email', '$password')";

$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

add_notice("Registered Successfully!");
redirect_to(GUI_REGISTER_STUDENT_URL);
?>
