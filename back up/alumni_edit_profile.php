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
alert(result);
}
});
}


return false;
});
});
</script>
</head>
<body background="green-design.jpg">
<form name = "editprofile" method = "post" action="alumni_edit_profile_method.php" >
<h2 align="center"><u>Alumni Edit Profile</u></h2>

<div>
	
	
  <table style="float: right">
<!--  <table  align="center" cellpadding="2">-->
<tr>
  <td>
    <img src="student-image-2.jpg" style="width:300px;height:300px">
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
        <!--<input type="text" name="Department" value = "<?php echo $department ?>" /> -->
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
     
    <!-- <table border="1" align ="center" cellpadding="2" >
  <tr>
    <td>
    <strong>Organization Name/ Project Name</strong>
    </td>
    <td>
    <strong>Amount Donated</strong>
    </td>
  <tr/>
  <tr>
  	<td>
  	<label for="textfield">Project1</label>
  	</td>
  	<td>
  	<label for="textfield">$1000</label>
  	</td>
  	
  </tr>
  <tr>
  	<td>
  	<label for="textfield">Project2</label>
  	</td>
  	<td>
  	<label for="textfield">$2000</label>
    </td>
    
  </tr>
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
  </table> -->
     <br/>
        <center><input type="submit" name="Save" value="Save"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="Cancel" value="Cancel"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="Reset" type="Reset" value="Reset" /></center>
      
 
</form>
<div> 
 <table border="1" align ="center" cellpadding="2" >
  <tr>
    <td>
    <strong>Organization Name/ Project Name</strong>
    </td>
    <td>
    <strong>Amount Donated</strong>
    </td>
  <tr/>
  <tr>
  	<td>
  	<label for="textfield">Project1</label>
  	</td>
  	<td>
  	<label for="textfield">$1000</label>
  	</td>
  	
  </tr>
  <tr>
  	<td>
  	<label for="textfield">Project2</label>
  	</td>
  	<td>
  	<label for="textfield">$2000</label>
    </td>
    
  </tr>
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
</div>

</body>
</html>