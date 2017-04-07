<?php
	$title = "Students Grade";
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Header.php');
	require_once("C:\\xampp\\htdocs\\webproject\\". '/php/authentication.php');
	authenticate_self_only('professor', $_SESSION['current_user']['id']);
?>

<script>

function send_post_request(id, grade, code) {
	var http = new XMLHttpRequest();
	var url = "http://localhost/webproject/student/update_student_grade.php?";
	var params = "id=" + id + "&grade=" + encodeURIComponent(grade) + "&code=" + code;
	var encoded = (url + params);
	http.open("POST", url, true);

	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {
	    if(http.readyState == 4 && http.status == 200) {
	        alert(http.responseText + "Grade Updated");
	    }
	}
	http.send(params);
}

function validate(count, id, code){
	var GradePattern = /^(?:[A-DFWI]|([A-C][\-\+]))$/;
	var Grade = document.getElementById("Grade_" + count);

	if( GradePattern.test(Grade.value) ){
		send_post_request(id, Grade.value, code);
		return true;
	}
	event.preventDefault();
	alert("Please, enter a valid grade!");
	return false;
}
</script>

<div id="show_pending_posts" style="width:75%">
<?php
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$page = $_GET['page'];
		$code = $_GET['code'];

		connect_to_db('aast');

		$records_per_page = 10;
		$start = $page * $records_per_page;

		$query = "SELECT SReg, Grade from take where CCode = ".$code." limit $start, $records_per_page";
		$courses = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());

		$total_number_of_records_query = "SELECT COUNT(*) as total FROM take where CCode = ".$code;
		$total_number_of_records = mysql_query($total_number_of_records_query) or die(mysql_error());
		$total_number_of_records = mysql_fetch_array($total_number_of_records)['total'];

		$query = "SELECT CName from course where Code = ".$code;
		$course_name = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
		$course_name = mysql_fetch_array($course_name);

		echo "<h1 align= \"left\" style=\" color:#8B0000\"> Students of ".$course_name['CName']." course </h1>";
		echo "<table id='table12345555' class=\"table table-bordered table-inverse\">";
		echo "<thead>";
		echo "<tr>\n";
		echo "<th>Student Name</th>";
		echo "<th>Student ID</th>";
		echo "<th>Grade</th>";
		echo "<th></th>";
		echo "</tr>\n";
		echo "</thead>";
		echo "<tbody>";
		$count = 1;
		while ($course = mysql_fetch_array($courses)) {
			echo "<tr>\n";
			$query = "SELECT SFName, SLName from student where id=".$course['SReg'];
			$student = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
			$student_name = "";
			echo "<td>";
			if ($student = mysql_fetch_array($student)) {
				$student_name = $student['SFName']." ".$student['SLName'];
				 echo $student_name;
			}
			$grade = $course['Grade'];
			echo "</td>";
			echo "<td>".$course['SReg']."</td>";

			echo "<td> <div class='input-group'>";
			echo "<input type='text' name='grade' id='Grade_".$count."' class='form-control' placeholder='Grade' value='".$grade."' >";
			echo "<br> </div> </td>";

			echo "<td> <input type='submit' class='btn btn-primary btn-block' value='Update' onclick='validate(".$count.",".$course['SReg'].",".$code.");'> </td>";

			echo "</tr>\n";
			$count += 1;
		}
		echo "</tbody>";
		echo "</table>\n";
		$prev_page = $page-1;
		$next_page = $page+1;
		if ($prev_page >= 0) {
			echo "<a href= ".STUDENTS_OF_COURSE_URL."?page=".$prev_page."&code=".$code." class=\"btn btn-danger btn-lg active \" role=\"button\" > Prev Page </a> &nbsp;";
		}
		if ($start + $records_per_page < $total_number_of_records) {
			echo "<a href= ".STUDENTS_OF_COURSE_URL."?page=".$next_page."&code=".$code." class=\"btn btn-danger btn-lg active \" role=\"button\" > Next Page </a>";
		}
	}
?>
</div>

<?php
	require_once("C:\\xampp\\htdocs\\webproject\\". '/Footer.php');
?>