<?php
$title = "Communities";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
authenticate(['loggedout']);
?>


	
	<div style="    border: 1px Solid White;
    margin-top: 10px;
    margin-bottom: 100px;
    margin-right: 300px;
    margin-left: 300px;
    background-color: White;">
	
	<h2 style="color: #26619c;">Students' Communities</h2>
	<a style="color: #26619c;" href="https://www.facebook.com/IEEEAAST/" target="_blank" >* IEEE AAST Alex SB</a><br>
	<a style="color: #26619c;" href="https://www.facebook.com/HandsAct/?pnref=story" target="_blank" >* Hands</a><br>
	<a style="color: #26619c;" href="https://www.facebook.com/Rise.Society.Org/" target="_blank" >* Rise Society</a><br>
	<a style="color: #26619c;" href="https://www.facebook.com/TEDxAASTMT/" target="_blank" >* TEDxAASTMT</a><br>
	<a style="color: #26619c;" href="https://www.facebook.com/aiesec.aastalex" target="_blank" >* AIESEC AAST Alex</a><br>
	<a style="color: #26619c;" href="https://www.facebook.com/fsc.aast/" target="_blank" >* Mozilla Campus Club at AAST</a><br>
	
	</div>
	


<?php
require_once(dirname(__FILE__). '/Footer.php');
?>