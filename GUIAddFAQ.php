<?php
$title = "Login";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
#authenticate(['loggedout']);
?>

<script>
	function validate(){
		var tit = document.getElementById("Title");
		var body = document.getElementById("Body");
		if(tit.value != ""
		   && body.value != ""){
			return true;
		}
		alert("Missing title or body!");
		return false;
	}
</script>

<div id = "post_div" style="width: 740px">
<form action = "http://localhost/webproject/php/AddFAQ.php" method = "post">

	<div class="input-group">
     <span class="input-group-addon">Title</span>
	<input type="text" name="title" id = "Title" class="form-control" placeholder="Question Title">
	</div>
	<br>
	Question Body:<br>
	<textarea cols="100" rows="15" name = "body" id="Body"> </textarea>
	<br>
	<input type="submit" value="Ask" class="btn btn-danger btn-block" onclick="validate();">

</form>
</div>

<?php
require_once(dirname(__FILE__). '/Footer.php');
?>