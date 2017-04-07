<?php
$title = "Login";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
authenticate(['loggedout']);
?>

<script>
	function validate(){
		var EmailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		if(EmailPattern.test(Email.value)){
			return true;
		}
		alert("Invalid Email");
		event.preventDefault();
		return false;
	}
</script>

<div class="container">
	<div id = "login_div" style="width:300px; height: 200px"  class="panel panel-primary" >
 		<div class="panel-heading"> Login </div>
		<form action = "http://localhost/webproject/php/Login.php" method = "post" id = "login_form">
			<div class="input-group">
    			<span class="input-group-addon"><i class="glyphicon glyphicon-user" style="color:#428bca"> </i></span>
				<input type="text"  class="form-control" name="email" placeholder="Email" id = "Email">
			</div>
			<br>
			<div class="input-group">
    			<span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="color:#428bca"> </i></span>
				<input type="password" class="form-control" name="password" placeholder="Password" id = "Pass">
			</div>
			<br>
			<input type="submit" class="btn btn-primary btn-block" value="Login" onclick="validate();">
		</form>
	</div>
</div>

<?php
require_once(dirname(__FILE__). '/Footer.php');
?>