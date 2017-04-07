<?php
require_once(dirname(__FILE__). '/functions.php');

connect_to_db("aast");

$title = $_POST["title"];
$body = $_POST["body"];
$ques_status = "pending";
$ans_status = "pending";

$query = "INSERT INTO FAQs (Title, Body, Ques_status, Ans_status)
VALUES ('$title', '$body', '$ques_status', '$ans_status')";

$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

add_notice("Question in Request!");
redirect_to(GUI_FAQs_URL);

?>
