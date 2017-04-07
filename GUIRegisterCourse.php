<?php
$title = "Register Courses";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
authenticate(['student']);
?>

<script>
	function validate(){
		var checked_courses = document.getElementByName("courses");
		var i;
		for(i = 0; i < checked_courses.length; i++){
			if(checked_courses[i].checked){
				alert("checked");
			}
		}
		alert("please select courses!");
		return false;
	}
</script>

<?php
	connect_to_db('aast');
	$term = $_SESSION['current_user']['STerm'];
	echo $term;
	$query = "SELECT * from course where term = $term ";
	$course = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
	#$courses = mysql_fetch_array($courses);
	echo "<div id = \"reg_courses\">";
	echo " <form action = \"http://localhost/webproject/php/RegisterCourse.php\" method = \"post\"> " ;
		
		echo "<table id='table2' class=\"table table-bordered table-inverse\" >";
		echo "<thead>";
		echo "<tr>\n";
		echo "<th>Code</th>";
		echo "<th>Name</th>";
		echo "<th>Credit Hours</th>";
		echo "<th>Content</th>";
		echo "<th>Materials</th>";
		echo "<th>Day</th>";
		echo "<th>Time</th>";
		echo "<th>Register</th>";
		echo "<th>Cancel</th>";
		echo "</tr>\n";
		echo "<thead>";
		echo "<tbody>";
		
		while ($courses = mysql_fetch_array($course)) {
			echo "<tr class=\"table-warning\" >\n";
			echo "<td>".$courses['Code']."</td>";
			echo "<td>".$courses['CName']."</td>";
			echo "<td>".$courses['CNoHrs']."</td>";
			echo "<td>".$courses['CContent']."</td>";
			echo "<td>".$courses['CMaterials']."</td>";
			echo "<td>".$courses['day']."</td>";
			echo "<td>".$courses['time']."</td>";
			echo "<td> <input type=\"checkbox\" name=\"courses[]\" value=" .$courses['Code']. "> <br> </td>";
			echo "<td> <input type=\"checkbox\" name=\"cancel[]\" value=" .$courses['Code']. "> <br> </td>";
			echo "</tr>\n";
		}

		echo "</tbody>";
		echo "</table>";
		echo " <input type=\"submit\" value=\"Finish\" class=\"btn btn-danger btn-block\" onclick=\"validate();\"> ";
	echo "</form>";
	echo "</div>";
?>


<?php
require_once(dirname(__FILE__). '/Footer.php');
?>