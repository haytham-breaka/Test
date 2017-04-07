<?php
	$title = "Show Post";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_request_method($_SERVER['REQUEST_METHOD'], ['GET']);
	authenticate(['loggedin']);
?>

<?php 	
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	    $post_id = $_GET['id'];

	    connect_to_db('aast');

	    $query = "SELECT * from post where id = $post_id";
		$post = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		$post = mysql_fetch_array($post);
		if($post == 0){
			echo "No such a post.";
		} else {
			echo "<h1 align= \"left\" style=\" color:#8B0000\"> Post </h1>";
	
			if ($post['status'] == "pending" && get_role() == "admin") {			
				echo "<a href= ".UPDATE_POST_URL."?id=".$post_id."&status=Approved class=\"btn btn-danger btn-lg active\" role=\"button\" > Approve </a> &nbsp;";
				echo "<a href= ".UPDATE_POST_URL."?id=".$post_id."&status=Rejected class=\"btn btn-danger btn-lg active\" role=\"button\" > Reject </a>";
			}
			
			echo "<table id='table128' class=\"table table-bordered table-inverse\">";
			
			echo "<tr>\n";
					echo "<td>ID</td>";
					echo "<td>".$post['id']."</td>"; 
			echo "</tr>\n";
			echo "<tr>\n";
					echo "<td>Student Name</td>";
					$query = "SELECT SFName, SLName from student where id=".$post['stID'];
					$user = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
					$student_name = "";
					echo "<td>";
						if ($user = mysql_fetch_array($user)) {
							$student_name = $user['SFName']." ".$user['SLName'];
					 		echo "<a href= ".SHOW_USER_URL."?table=student&id=".$post['stID'].">".$student_name."</a>";
						}
					echo "</td>";
			echo "</tr>\n";	
			echo "<tr>\n";
					echo "<td>Title</td>";
					echo "<td>".$post['title']."</td>"; 
			echo "</tr>\n";
			echo "<tr>\n";
					echo "<td>Content</td>";
					echo "<td>".$post['PContent']."</td>"; 
			echo "</tr>\n";
			echo "<tr>\n";
					echo "<td>Status</td>";
					echo "<td>".$post['status']."</td>"; 
			echo "</tr>\n";
			echo "<tr>\n";
					echo "<td>Creation Date</td>";
					echo "<td>".$post['PDate']."</td>"; 
			echo "</tr>\n";
	
			echo "</table>\n";
		}
	}
?>

<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Footer.php');
?>