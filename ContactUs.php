<?php
$title = "Contact Us";
require_once(dirname(__FILE__). '/Header.php');
require_once(dirname(__FILE__). '/php/authentication.php');
authenticate(['loggedout']);
?>

<script>
	function validate(){
		var EmailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		var NamePattern=  /^[A-Za-z ]+$/
		
		if(RO.checked && Other.value="") alert("please write something in the others box");
		if(FName.value="" || !NamePattern.test(FName.value)) alert("please write your first name in a correct way");
		if(LName.value="" || !NamePattern.test(LName.value)) alert("please write your last name in a correct way");
		if(Email.value="" || !EmailPattern.test(Email.value)) alert("please write your Email in a correct way");
		if(EmailPattern.test(Email.value) && NamePattern.test(FName.value) && NamePattern.test(LName.value) ){
			return true;
		}
		if(TA.value="")alert("Please write your message!");
		event.preventDefault();
		return false;
	}
</script>

<div style= "border: 1px Solid White; margin-top: 10px; margin-bottom: 100px; margin-right: 300px; margin-left: 300px; background-color: White;">
<h1 style="color: #26619c; font-family: Calibri;">Contact Us Form</h1>
<h3 style="color: #D21404; font-family: Calibri;">If you're looking for more information or you have additional iquiry or suggestions, please fill in the short form below and we'll be in touch as soon as possible.</h3>

<form action = "http://localhost/webproject/HomePage.php" method = "post">
<table style="width:100%">
  
  <tr style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>I am &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp      
	<input type="radio" value="student" name="R1" checked id="RS">Student @ AASTMT    <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
  	<input type="radio" value="application" name="R1" id="RA"> New Application      <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
  	<input type="radio" value="faculty" name="R1" id="RF">Faculty/staff      <br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	<input type="radio" value="other" name="R1" id="RO">Other      
	<input type="text" name="" id="Other" >     &nbsp <br> <br>
    </th>
   </tr>
  
  
  <tr style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>Title &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	<select>        
          <option> Dr. </option>
          <option> GTA </option>
          <option> MR </option>
          <option> MS </option>
	  <option> MRS </option>
	  <option> Engineer </option>
	  <option> Student </option>
        </select>		<br> <br>
     </th>
  </tr>
  
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>   
	First Name &nbsp 
	<input type="text" name="first name" id="FName">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	 Last Name &nbsp 
	<input type="text" name="last name" id="LName">
	 <br>  <br>
    </th>
  </tr>
 
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th> 
	Email   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	<input type="email" name="e-mail" id="Email">
		 <br>  <br>
    </th>
  </tr>
 
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th> Your information or inquiry concerning:  <br> <br> </th>
  </tr>
 
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>
       <input type="radio" value="faculty member" checked>Faculty Member  </th>
  </tr>
  
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>
  	<input type="radio" value="Admiision" >  Admission & Registeraion </th>
  </tr>
  
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>
  	<input type="radio" value="web" >Website</th>
  </tr>
  
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>
	<input type="radio" value="professional" > Professional certifcates or Testing Services such as OCA, ICDL, CBP,...</th>
  </tr>
  
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>
	<input type="radio" value="education" > continuing Education & community services Program <br> <br> <br> </th>
  </tr>
  
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>  Please write your message below  <br>
       <input type="textarea" name="message" rows="4" cols="50" id="TA"> <br><br><br> </th>
  </tr>
  
 
  <tr  style="color: #26619c; font-family: Calibri; margin-left: 0px;">
    <th>
       <input type="submit" value="Send your message" onclick="validate();">
    </th>
  </tr>
  
</table>
</form>

</div>

<?php
require_once(dirname(__FILE__). '/Footer.php');
?>