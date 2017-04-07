<?php
require_once(dirname(__FILE__). '/functions.php');

connect_to_db("aast");

$title = $_POST["title"];
$content = $_POST["content"];
$StID = $_SESSION['current_user']['id'];

$query = "SELECT id from blog where SID = '$StID' ";
$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
$row = mysql_fetch_array($result);

$blog_ID = $row["id"];
$date = date ("Y-m-d H:i:s", time()); 
$status = "pending";

$query = "INSERT INTO post (stID, BlgID, title, PDate, PContent, status)
VALUES ('$StID', '$blog_ID', '$title', '$date', '$content', '$status')";

$result = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

add_notice("Post in Request!");
redirect_to(APPROVED_POSTS_URL."?page=0");

?>
