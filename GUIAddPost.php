<?php
	$title = "Add Post";
	require_once(dirname(__FILE__). '/Header.php');
	require_once(dirname(__FILE__). '/php/authentication.php');
	authenticate(['student']);
?>

<script type="text/javascript">
	function validate(){
		var tit = document.getElementById("Title");
		var cont = document.getElementById("Content");
		if(tit.value != ""
		   && cont.value != ""){
			return true;
		}
		alert("Missing title or content!");
		return false;
	}
</script>

<div id = "post_div" style="width: 740px">
<form action = "http://localhost/webproject/php/AddPost.php" method = "post">

	<div class="input-group">
     <span class="input-group-addon">Title</span>
	<input type="text" name="title" id = "Title" class="form-control" placeholder="Post Title">
	</div>
	<br>
	Post:<br>
	<textarea cols="100" rows="40" name = "content" id="Content"> </textarea>
	<br>
	<input type="submit" value="Post" class="btn btn-danger btn-block" onclick="validate();">
</form>
</div>

<?php
	require_once(dirname(__FILE__). '/Footer.php');
?>