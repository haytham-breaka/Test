<?php
$title = "Degrees Offered";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
authenticate(['loggedout']);
?>

	<div class="col-sm-13" >
	
	<div class="container-fluid bg-1 text-center" style="background:#D3D3D3; ">
	<img  class="center-block img-responsive" src="13.png" width="850" height="300" />
	<img  class="center-block img-responsive" src="14.png" width="850" height="300" />
	<img  class="center-block img-responsive" src="15.png" width="850" height="300" />
	</div>
	
	</div>

<?php
require_once(dirname(__FILE__). '/Footer.php');
?>