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
      font-family: Calibri;">Core Values</h1>
<h2 style="color: red;
      font-family: Calibri;}">" 1st. CHOICE "</h2>
<img src="Table1.png" alt="C:\Users\shaza\Desktop\Mona" style="width:500px;height:300px;">
<img src="Cycle.png" alt="C:\Users\shaza\Desktop\Mona" style="width:500px;height:500px;">
<p style="color: Gray;
      font-family: Calibri;">The Governing Values are translated into the following Organizational Behavior:</p>
<img src="Table2.png" alt="C:\Users\shaza\Desktop\Mona" style="width:500px;height:800px;">
</div>

<?php
require_once(dirname(__FILE__). '/Footer.php');
?>
