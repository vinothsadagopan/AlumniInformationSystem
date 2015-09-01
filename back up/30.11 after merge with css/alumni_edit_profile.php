<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php include 'dbconnect.php'?>
<?php
setcookie('User_ID','user');  // Hard Coding cookie values for temporary basis
setcookie('Person_ID','4');     // Hard Coding cookie values for temporary basis
$Person_ID = $_COOKIE['Person_ID'];
$User_ID = $_COOKIE['User_ID'];

$query = "select L_Name, F_Name, Email_Id, DOB, Address,Ph_no, Marital_Status from Person where Person_Id ='$Person_ID'";
$result = mysql_query($query);
//echo $result;
while($row = mysql_fetch_array($result)) {
	$FirstName = $row['F_Name'];
	$LastName = $row['L_Name'];
	$Email_ID = $row['Email_Id'];
	$DOB = $row['DOB'];
	$Address = $row['Address'];
	$Ph_No = $row['Ph_no'];
	$Marital_Status = $row['Marital_Status'];
	//echo $Address;
}

$query = "select d.Dept_Name, a.Degree, a.Graduated_year from alumni a, department d where  a.Department_Id = d.dept_id and a.Person_id = '$Person_ID'";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)) {
$department = $row ['Dept_Name'];
$Graduated_year = $row ['Graduated_year'];
$Degree = $row['Degree'];

}


 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Alumni Edit Profile</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#adddonation").click(function(){
var projectname = $("#projectname").val();
var amount = $("#amount").val();
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'projectname1='+ projectname + '&amount1='+ amount;
if(projectname==''||amount=='')
{
alert("Please Fill the Fields");
}
else
{
// AJAX Code To Submit Form.
$.ajax({
type: "POST",
url: "getdonations.php",
data: dataString,
cache: false,
success: function(result){
$("#fundingtable").append(result);
}
});
}
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/alumni.css">
return false;
});
});
</script>
</head>
<?php include 'header.php'; ?>
<body background="green-design.jpg">
  <?php include 'sidebar.php'; ?>
<form name = "editprofile" method = "post" action="alumni_edit_profile_method.php"  enctype="multipart/form-data" >
  <section>
    <div class="wrapper">
      <div id="main">
<form name = "editprofile" >
<h2 align="center"><u>Alumni Edit Profile</u></h2>

<div>
	
	
  <table style="float: right">
<!--  <table  align="center" cellpadding="2">-->
<tr>
  <td>
    <img src="student-image-2.jpg" style="width:300px;height:300px">
    </td>
  </tr>
  <tr>
  <td>
             
       
</br>

        <div class="form-group" style="margin-right: 45%;">
<input name="userfile" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">		   
        </div>
      <div class="form-group" >
	  </br>
           
        </div>
    
    </td>
  </tr>
</table>
</div>
<div>
  <table width="500" cellpadding="6" align="center">
        <tr>
      <td align="left">
        <label for="label"><strong>First Name: </strong></label>
      </td>
      <td align="left">
        <input type="text" name="firstname" value= "<?php echo $FirstName ?>"  />
		<input type ="hidden" name ="personid" value ="<?php echo $Person_ID ?>" >
     </td>
    </tr>
 <tr>
      <td align="left">
        <label for="label"><strong>Last Name: </strong></label>
      </td>
      <td align="left">
        <input type="text" name="lastname" value= "<?php echo $LastName ?>"  />
     </td>
    </tr>
<tr>
<tr>
   <td align="left">
        <label for="label"><strong>Password: </strong></label>
   </td>
   <td align="left">
        <input type="password" name="Password" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Email: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="email" value = "<?php echo $Email_ID ?>" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Department: </strong></label>
   </td>
   <td align="left">
		<select name = "Department">
		<option> Computer  </option>
		<option> Electrical </option>
		<option > Mechanical</option>
		</select>
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Degree Earned: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="degree" value="<?php echo $Degree ?>" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Graduation Year: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="graduationyear" value = "<?php echo $Graduated_year?>" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="textfield"><strong>Date of Birth: </strong></label>
   </td>
	  <td >
       <input type="text" name="dateofbirth" value = "<?php echo $DOB ?>" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Address: </strong></label>
   </td>
   <td align="left">
        <textarea rows="3" cols="30" name="address" > <?php echo $Address ?></textarea>
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Contact No.: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="contactno" value = "<?php echo $Ph_No ?>" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Marital Status: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="status" value ="<?php echo $Marital_Status ?>" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Fundings : </strong></label>
   </td>
</tr>
     </table>
     </div>
     
    <table border="1" align ="center" cellpadding="2" id="fundingtable" >
  <tr>
    <td>
    <strong>Organization Name/ Project Name</strong>
    </td>
    <td>
    <strong>Fundings</strong>
    </td>
  <tr/>
  <?php 
 $query = "select a.Activity_Name, a.Fund_Raising_Amount  from activity a, alumni_involved_activity ai, alumni al where a.Activity_Id = ai.Activity_Id and ai.Alumni_Id = al.Alumni_Id and al.Person_id = '$Person_ID'";
 $result = mysql_query($query);
 while($row = mysql_fetch_array($result)) {
$Activity_Name = $row ['Activity_Name'];
$Fund_Raising_Amount = $row['Fund_Raising_Amount'];
//echo $Activity_Name;
//echo $Fund_Raising_Amount;
//echo "<table border='1' align ='center' cellpadding='2' >\n";
//echo "<tr>\n";
//echo "<td>";
//echo "<strong>Organization Name/ Project Name</strong>";
  	
//echo "</td>";
		
  	
//echo "<td>";
//echo "<strong>Amount Donated</strong> </td>";
//echo "<tr/>";
echo "<tr>";
echo "<td>";
echo "<label for='textfield'>";
echo $Activity_Name;
echo "</label>";
echo "</td>";
echo "<td>";
echo "<label for='textfield'>";
echo $Fund_Raising_Amount;
echo "</label>";
echo "</td>";
echo "</tr>";
//echo "</table>";

  	
}
 ?>
 </table>  
  <table width="500" cellpadding="6" align="center">
  <tr>
  	<td>
  	<input type="text" name="project_name3" id ="projectname" />
  	</td>
  	<td>
  	<input type="text" name="amount3" id = "amount" />
    </td>
    <td>
  	<input type="button" id ="adddonation" name="Add" value="Add Donation"/>
  	</td>
  </tr>
  </table> 
     <br/>
        <center><input type="submit" name="Save" value="Save"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="Cancel" value="Cancel"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="Reset" type="submit" value="Back" onclick = "document.location.href = 'alumni_profile.php'" /></center>
      
 
</form>
<footer>
		<div class="wrapper"></div>
	</footer>

</body>
</html>