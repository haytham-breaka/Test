<?php
	$title = "Home";
	require_once(dirname(__FILE__). '/Header.php');
	require_once(dirname(__FILE__). '/php/authentication.php');
	require_once(dirname(__FILE__). '/php/functions.php');
	authenticate(['loggedin']);
?>

<?php if (get_role() == "admin"): ?>
<div id = "fullpage">
<form id= "admin_form" action = "" method = "post" style="width:1000px">
		<div align = "left">
		<img src= "data:image/jpeg; base64, <?php echo base64_encode( $_SESSION['current_user']['photo'] ); ?>" class="img-rounded" alt="Cinque Terre"/>
		</div>
		<div id="naaame"> <?php echo "<h1 align= \"left\" style=\" color:#8B0000\"> ".fullname()." </h1>"; ?> </div>
		<div id = "schedule">
			<?php
				connect_to_db('aast');
				$ID = $_SESSION['current_user']['id'];
				$query = "SELECT CCode from take where SReg = $ID ";
				$courses = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
				#$courses = mysql_fetch_array($courses);


				echo "<h1 align= \"left\" style=\" color:#8B0000\"> Schedule </h1>";
				echo "<table id='table1' class=\"table table-bordered table-inverse\">";
				echo "<thead>";
				echo "<tr>\n";

				echo "<th>Course Code</th>";
				echo "<th>Course Name</th>";
				echo "<th>Day</th>";
				echo "<th>Time</th>";

				echo "</tr>\n";
				echo "</thead>";
				echo " <tbody>";
				while ($courses = mysql_fetch_array($courses)) {
					$curr_course_code = $courses['CCode'];
					$query2 = "SELECT Code, CName, time, day from course where Code = $curr_course_code ";
					$course_details = mysql_query($query2) or die ("Couldn’t execute query. " . mysql_error());
					$course_details = mysql_fetch_array($course_details);

					echo "<tr class=\"table-warning\" >\n";
					echo "<td>".$course_details['Code']."</td>";
					echo "<td>".$course_details['CName']."</td>";
					echo "<td>".$course_details['day']."</td>";
					echo "<td>".$course_details['time']."</td>";
					echo "</tr>\n";
				}
				echo " </tbody>";
				echo " </table>";
			
			?>
			<br>
		</div>

		<div id= "navigation" style="width:200px">
			<?php
				
				echo "<table id='table2' class=\"table\" >";
				echo "<thead>";
				echo "<tr>\n";
				echo "<th>Navigation List</th>";
				echo "</tr>\n";
				echo "</thead>";

				echo " <tbody>";
				echo "<tr>\n";
				echo "<td> <a href= ".SHOW_STUDENTS_URL."?page=0"." class=\"btn btn-primary btn-lg active btn-block\" role=\"button\" > Students </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".SHOW_PROFESSORS_URL."?page=0"." class=\"btn btn-success btn-lg active btn-block\" role=\"button\" > Professors </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".SHOW_ADMINS_URL."?page=0"." class=\"btn btn-info btn-lg active btn-block\" role=\"button\" > Admins </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".SHOW_PENDING_POSTS_URL."?page=0 class=\"btn btn-warning btn-lg active btn-block\" role=\"button\" > Pending Posts </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".APPROVED_POSTS_URL."?page=0 class=\"btn btn-danger btn-lg active btn-block\" role=\"button\"> View Blogs </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".GUI_REGISTER_STUDENT_URL." class=\"btn btn-primary btn-lg active btn-block\" role=\"button\" > Register </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".SHOW_USER_URL."?table=".get_role()."&id=".$_SESSION['current_user']['id']." class=\"btn btn-success btn-lg active btn-block\" role=\"button\" > Personal Information </a> </td>";
				echo "</tr>\n";
				
				echo " </tbody>";
				echo " </table>";
			?>
		</div>
</form>
</div>
<?php endif; ?>

<div id = "fullpage">
<?php if (get_role() == "professor"): ?>
<form id= "professor_form" action = "" method = "post" style="width:1000px">
	<div align = "left">
		<img src= "data:image/jpeg; base64, <?php echo base64_encode( $_SESSION['current_user']['photo'] ); ?>" class="img-rounded" alt="Cinque Terre"/>
	</div>
	<div id="naaame"> <?php echo "<h1 align= \"left\" style=\" color:#8B0000\"> ".fullname()." </h1>"; ?> </div>
	<div id = "schedule">
		<?php
			connect_to_db('aast');
			$ID = $_SESSION['current_user']['id'];
			$query = "SELECT CCode from teach where PrfID = $ID ";
			$courses = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
			#$courses = mysql_fetch_array($courses);


			echo "<h1 align= \"left\" style=\" color:#8B0000\"> Schedule </h1>";
			echo "<table id='table1' class=\"table table-bordered table-inverse\">";
			echo "<thead>";
			echo "<tr>\n";

			echo "<th>Course Code</th>";
			echo "<th>Course Name</th>";
			echo "<th>Day</th>";
			echo "<th>Time</th>";

			echo "</tr>\n";
			echo "</thead>";
			echo " <tbody>";
			while ($course = mysql_fetch_array($courses)) {
				$curr_course_code = $course['CCode'];
				$query2 = "SELECT Code, CName, time, day from course where Code = $curr_course_code ";
				$course_detail = mysql_query($query2) or die ("Couldn’t execute query. " . mysql_error());
				$course_details = mysql_fetch_array($course_detail);

				echo "<tr class=\"table-warning\" >\n";
				echo "<td>".$course_details['Code']."</td>";
				echo "<td>".$course_details['CName']."</td>";
				echo "<td>".$course_details['day']."</td>";
				echo "<td>".$course_details['time']."</td>";
				echo "</tr>\n";
			}
			echo " </tbody>";
			echo " </table>";
		
		?>
		<br>
	</div>

	<div id= "navigation" style="width:200px">
		<?php
			
			echo "<table id='table2' class=\"table\" >";
			echo "<thead>";
			echo "<tr>\n";
			echo "<th>Navigation List</th>";
			echo "</tr>\n";
			echo "</thead>";

			echo " <tbody>";
			echo "<tr>\n";
			echo "<td> <a href= ".PROF_COURSE_URL."?page=0"." class=\"btn btn-primary btn-lg active btn-block\" role=\"button\" > Set Students' Grades </a> </td>";
			echo "</tr>\n";

			echo "<tr>\n";
			echo "<td> <a href= ".APPROVED_POSTS_URL."?page=0"." class=\"btn btn-success btn-lg active btn-block\" role=\"button\" > View Blog </a> </td>";
			echo "</tr>\n";

			echo "<tr>\n";
			echo "<td> <a href= ".SHOW_USER_URL."?table=".get_role()."&id=".$_SESSION['current_user']['id']." class=\"btn btn-info btn-lg active btn-block\" role=\"button\" > Personal Information </a> </td>";
			echo "</tr>\n";
			
			echo " </tbody>";
			echo " </table>";
		?>
	</div>
</form>
<?php endif; ?>
</div>

<?php if (get_role() == "student"): ?>

<div id = "fullpage">
<form id= "student_form" action = "" method = "post" style="width:1000px">
		<div align = "left">
		<img src= "data:image/jpeg; base64, <?php echo base64_encode( $_SESSION['current_user']['photo'] ); ?>" class="img-rounded" alt="Cinque Terre"/>
		</div>
		<div id="naaame"> <?php echo "<h1 align= \"left\" style=\" color:#8B0000\"> ".fullname()." </h1>"; ?> </div>

		<div id = "schedule">
			<?php
				connect_to_db('aast');
				$ID = $_SESSION['current_user']['id'];
				$query = "SELECT CCode from take where SReg = $ID ";
				$courses = mysql_query($query) or die ("Couldn’t execute query. " . mysql_error());
				#$courses = mysql_fetch_array($courses);


				echo "<h1 align= \"left\" style=\" color:#8B0000\"> Schedule </h1>";
				echo "<table id='table1' class=\"table table-bordered table-inverse\">";
				echo "<thead>";
				echo "<tr>\n";

				echo "<th>Course Code</th>";
				echo "<th>Course Name</th>";
				echo "<th>Day</th>";
				echo "<th>Time</th>";

				echo "</tr>\n";
				echo "</thead>";
				echo " <tbody>";
				while ($course = mysql_fetch_array($courses)) {
					$curr_course_code = $course['CCode'];
					$query2 = "SELECT Code, CName, time, day from course where Code = $curr_course_code ";
					$course_details = mysql_query($query2) or die ("Couldn’t execute query. " . mysql_error());
					$course_details = mysql_fetch_array($course_details);

					echo "<tr class=\"table-warning\" >\n";
					echo "<td>".$course_details['Code']."</td>";
					echo "<td>".$course_details['CName']."</td>";
					echo "<td>".$course_details['day']."</td>";
					echo "<td>".$course_details['time']."</td>";
					echo "</tr>\n";
				}
				echo " </tbody>";
				echo " </table>";
			
			?>
			<br>
		</div>

		<div id= "navigation" style="width:200px">
			<?php
				
				echo "<table id='table2' class=\"table\" >";
				echo "<thead>";
				echo "<tr>\n";
				echo "<th>Navigation List</th>";
				echo "</tr>\n";
				echo "</thead>";

				echo " <tbody>";

				echo "<tr>\n";
				echo "<td> <a href= ".GUI_ADD_POST_URL." class=\"btn btn-primary btn-lg active btn-block\" role=\"button\" > Add Post </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".SELF_POSTS_URL."?page=0 class=\"btn btn-success btn-lg active btn-block\" role=\"button\" > My Posts </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".APPROVED_POSTS_URL."?page=0 class=\"btn btn-info btn-lg active btn-block\" role=\"button\" > View Blogs </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".GUI_REGISTER_Course_URL." class=\"btn btn-warning btn-lg active btn-block\" role=\"button\" > Register a new term </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".STUDENTS_RESULTS_URL." class=\"btn btn-danger btn-lg active btn-block\" role=\"button\"> View Results </a> </td>";
				echo "</tr>\n";

				echo "<tr>\n";
				echo "<td> <a href= ".SHOW_USER_URL."?table=".get_role()."&id=".$_SESSION['current_user']['id']." class=\"btn btn-primary btn-lg active btn-block\" role=\"button\" > Personal Info </a> </td>";
				echo "</tr>\n";

				echo " </tbody>";
				echo " </table>";


			?>
		</div>
</form>
</div>
<?php endif; ?>

<?php
	require_once(dirname(__FILE__). '/Footer.php');
?>