<?php
$title = "Register Student";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
authenticate(['admin']);
?>

<script>
	function validateName(name) {
		var NamePattern = /[A-Z][a-z]+/;
		return NamePattern.test(name);
	}

	function validateNames(f_name, m_name, l_name) {
		return validateName(f_name) && validateName(m_name) && validateName(l_name);
	}

	function validateEmail(email) {
		var EmailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return EmailPattern.test(email);
	}

	function validateAdmin(){
		var GPAPattern = /^[0-3]\.\d{1,2}|4\.0{1,2}$/;
		var AHPattern = /^[0-9]{1,3}$/;
		var Name = document.getElementById("AN");
		var Email = document.getElementById("AEmail");

		if(validateName(Name.value) && validateEmail(Email.value)) {
			return true;
		}
		event.preventDefault();
		alert("Registeration Failed");
		return false;
	}

	function validateProf(){
		var GPAPattern = /^[0-3]\.\d{1,2}|4\.0{1,2}$/;
		var AHPattern = /^[0-9]{1,3}$/;
		var Name = document.getElementById("PN");
		var Email = document.getElementById("PEmail");

		if(validateName(Name.value) && validateEmail(Email.value)) {
			return true;
		}
		event.preventDefault();
		alert("Registeration Failed");
		return false;
	}

	function validateStudent(){
		var GPAPattern = /^[0-3]\.\d{1,2}|4\.0{1,2}$/;
		var AHPattern = /^[0-9]{1,3}$/;
		var FirstName = document.getElementById("SFN");
		var MiddleName = document.getElementById("SMN");
		var LastName = document.getElementById("SLN");
		var Email = document.getElementById("SEmail");
		var GPA = document.getElementById("GPA");
		var AchievedHours = document.getElementById("AchievedHours");

		if(validateNames(FirstName.value, MiddleName.value, LastName.value)
			&& validateEmail(Email.value)
			&& GPAPattern.test(GPA.value)
			&& AHPattern.test(AchievedHours.value)){
			return true;
		}
		event.preventDefault();
		alert("Registeration Failed");
		return false;
	}

	function handleRadioClick(radio) {
		if (radio.value == 1) {
			document.getElementById('admin_form').style.display = 'block';
			document.getElementById('professor_form').style.display = 'none';
			document.getElementById('student_form').style.display = 'none';
		} else if (radio.value == 2) {
			document.getElementById('admin_form').style.display = 'none';
			document.getElementById('professor_form').style.display = 'block';
			document.getElementById('student_form').style.display = 'none';
		} else if (radio.value == 3) {
			document.getElementById('admin_form').style.display = 'none';
			document.getElementById('professor_form').style.display = 'none';
			document.getElementById('student_form').style.display = 'block';
		}
	}
</script>

<div>
Register Admin: <input type="radio" name="myRadios" onclick="handleRadioClick(this);" value="1" /> <br>
Register Professor: <input type="radio" name="myRadios" onclick="handleRadioClick(this);" value="2" /> <br>
Register Student: <input type="radio" name="myRadios" onclick="handleRadioClick(this);" value="3"  checked="checked"/> <br>
</div>

<div class="panel-group" id="admin_form" style="display:none" >
<div id = "admin_reg" class="panel panel-danger" style="width: 500px">
<div class="panel-heading">Register Admin</div>
<div class="panel-body">
<form id= "admin_form" action = "http://localhost/webproject/php/RegisterAdmin.php" method = "post">
	
	<div class="input-group">
    <span class="input-group-addon">Name</span>
	<input type="text" name="name" id = "AN" class="form-control" placeholder="First Name" > <br>
	</div>

	<div class="input-group">
	<input type="text" class="form-control" name="email" placeholder="Email" id = "AEmail" > <br>
	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
    </div>

	<div class="input-group">
	<input type="password"  class="form-control" name="password" placeholder="Password" id = "APass" > <br>
	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    </div>


	<input type="submit" value="Submit" class="btn btn-danger btn-block"  onclick="validateAdmin();">
</form>
</div>
</div>
</div>

<div class="panel-group" id="professor_form" style="display:none" >
<div id = "professor_reg" class="panel panel-danger" style="width: 500px">
<div class="panel-heading">Register Professor</div>
<div class="panel-body">
<form action = "http://localhost/webproject/php/RegisterProf.php" method = "post" >

	<div class="input-group">
    <span class="input-group-addon">Name</span>
	<input type="text" name="name" id = "PN" class="form-control" placeholder="First Name" > <br>
	</div>

	<div class="input-group">
	<input type="text" class="form-control" name="email" placeholder="Email" id = "PEmail" > <br>
	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
    </div>

	<div class="input-group">
	<input type="password"  class="form-control" name="password" placeholder="Password" id = "PPass" > <br>
	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    </div>

	Department:<br>
	<select name="department" class="form-control" data-style="btn-danger" id = "PDep">
		<option value="123">Computer</option>
		<option value="124">Mechanical</option>
		<option value="125">Electronics</option>
		<option value="126">Communication</option>
	</select> <br>

	<input type="submit" value="Submit"  class="btn btn-danger btn-block" onclick="validateProf();">
</form>
</div>
</div>
</div>

<div class="panel-group" id= "student_form">
<div id = "student_reg" class="panel panel-danger" style="width: 500px">
<div class="panel-heading">Register Student</div>
<div class="panel-body">
<form id= "student_form" action =  "http://localhost/webproject/php/RegisterStudent.php" method = "post">   

	<div class="input-group">
    <span class="input-group-addon">First Name</span>
	<input type="text" name="firstname" id = "SFN" class="form-control" placeholder="First Name" > <br>
	</div>

	<div class="input-group">
    <span class="input-group-addon">Middle Name</span>
	<input type="text" name="middlename" id = "SMN" class="form-control" placeholder="Middle Name" > <br>
	</div>

	<div class="input-group">
    <span class="input-group-addon">Last Name</span>
	<input type="text" name="lastname" id = "SLN" class="form-control" placeholder="Last Name"> <br>
	</div>

    <div class="input-group">
	<input type="text" class="form-control" name="email" placeholder="Email" id = "SEmail"> <br>
	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
    </div>

	<div class="input-group">
	<input type="password"  class="form-control" name="password" placeholder="Password" id = "SPass" > <br>
	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    </div>
	
	<div class="input-group">
    <span class="input-group-addon">GPA</span>
	<input type="text" name="gpa" class="form-control" placeholder="GPA"  id = "GPA" > <br>
	</div>

	Term:<br>
	<select name="term" class="form-control" id = "Term">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
	</select> <br>
	
	<div class="input-group">
    <span class="input-group-addon">Achieved Hours</span>
	<input type="text" name="achievedhours" class="form-control" placeholder="Achieved Hours" id = "AH"> <br>
	</div>

Department:<br>
<select  class="form-control" data-style="btn-danger" name="department" id = "SDep">
  		<option value="123">Computer</option>
		<option value="124">Mechanical</option>
		<option value="125">Electronics</option>
		<option value="126">Communication</option>
</select> <br>

	<input type="submit" value="Submit" class="btn btn-danger btn-block" onclick="validateStudent();">

</form>
</div>
</div>
</div>

<?php
require_once(dirname(__FILE__). '/Footer.php');
?>