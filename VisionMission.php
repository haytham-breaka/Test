<?php
$title = "Mission And Vision";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
authenticate(['loggedout']);
?>


<div style="border: 1px Solid White; margin-top: 100px; margin-bottom: 100px; margin-right: 300px; margin-left: 300px; background-color: White;">

<h1 style="color: blue; font-family: Calibri;}">Vision & Mission</h1>

<h3 style="color: red; font-family: Calibri;">AASTMT Vision</h3>
<p style="color: Gray; font-family: Calibri; text-align: justify; text-justify: inter-word;">
"To be a world class university in Maritime Transport and Higher Education in compliance with the international standards of Education, Scientific Research, Innovation and Training while fulfilling its Social Responsibilities in order to maintain its position as the distinguished Arab Expertise House and to be the first choice of the students in the region".</p>

<h3 style="color: red; font-family: Calibri;">AASTMT Mission</h3>
<p style="color: Gray; font-family: Calibri; text-align: justify; text-justify: inter-word;">
"Contributing to the social and economic development of the Arab region by offering distinguished Change Agents who have been qualified through comprehensive educational programs, high caliber faculty, and centers of excellence in research, training and consultancies while strictly committed to the highest levels of Quality".</p>

</div>


<?php
require_once(dirname(__FILE__). '/Footer.php');
?>