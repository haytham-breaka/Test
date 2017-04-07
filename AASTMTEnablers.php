<?php
$title = "Core Values";
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
<h1 style="color: blue;
      font-family: Calibri;">AASTMT Enablers</h1>
<p style="color: Gray;
      font-family: Calibri;"> For the academy to achieve its Strategic Goals, ASTMT has to further improve and enhance the following:</p>
<ol>
<li style="color: Gray;
      font-family: Calibri;">Institutional Capacity</li>
<li style="color: Gray;
      font-family: Calibri;"> Faculty Members'' Capabilities</li>
<li style="color: Gray;
      font-family: Calibri;"> Admin Staff Performance</li>
<li style="color: Gray;
      font-family: Calibri;"> AASTMT Financial Capacity</li>
<li style="color: Gray;
      font-family: Calibri;"> Students'' Societies & Unions Activities</li>
</ol>
<img src="aastmt enablers.png" alt="C:\Users\shaza\Desktop\Mona" style="width:450px;height:300px;">

</div>

<?php
require_once(dirname(__FILE__). '/Footer.php');
?>

