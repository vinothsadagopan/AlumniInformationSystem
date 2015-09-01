<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php include 'dbconnect.php'?>
<?php
setcookie('User_ID','user');  // Hard Coding cookie values for temporary basis
setcookie('Person_ID','4');     // Hard Coding cookie values for temporary basis
$Person_ID = $_COOKIE['Person_ID'];
$User_ID = $_COOKIE['User_ID'];

$query = "select concat(L_Name ,' ', F_Name) as Name, Email_Id, DOB, Address,Ph_no, Marital_Status from Person where Person_Id ='$Person_ID'";
$result = mysql_query($query);
//echo $result;
while($row = mysql_fetch_array($result)) {
	$Name = $row['Name'];
	$Email_ID = $row['Email_Id'];
	$DOB = $row['DOB'];
	$Address = $row['Address'];
	$Ph_No = $row['Ph_no'];
	$Marital_Status = $row['Marital_Status'];
}

$query = "select d.Dept_Name, a.Degree, a.Graduated_year from alumni a, department d where  a.Department_Id = d.dept_id and a.Person_id = '$Person_ID'";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)) {
$department = $row ['Dept_Name'];
$Graduated_year = $row ['Graduated_year'];
$Degree = $row['Degree'];

}
//$query = "select a.Activity_Name, a.Fund_Raising_Amount  from activity a, alumni_involved_activity ai, alumni al where a.Activity_Id = ai.Activity_Id and ai.Alumni_Id = al.Alumni_Id and al.Person_id = '$Person_ID'";
//echo $query;
//$result = mysql_query($query);
//while($row = mysql_fetch_array($result)) {
//$Activity_Name = $row ['Activity_Name'];
//$Fund_Raising_Amount = $row['Fund_Raising_Amount'];
//echo $Activity_Name;
//echo $Fund_Raising_Amount;
//}
 ?>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Alumni Profile</title>
<script>
function confirmdelete(){
var r = confirm("Are you sure to delete your account?");
if(r== true){
document.location.href ='delete_account.php';
return true;
}
else
{
return false;
}

}
</script>

</head>
<body background="green-design.jpg" >

<h2 align="center"><u>Alumni Profile</u></h2>

<form id="form1" name="form1" >
<div>
  <table style="float: right" >
<!--  <table  align="center" cellpadding="2">-->
<tr>
  <td>
    <img src="student-image-2.jpg" style="width:300px;height:300px">
    </td>
  </tr>
</table>
</div>
<div>
  <table  align="center" cellpadding="4">
  
    <tr>
      <td align="left">
        <label for="textfield"><strong>Name: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $Name ?></label>
      </td>
    </tr>
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Username: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $User_ID ?></label>
      </td>
    </tr>
    
     <tr>
      <td align="left">
        <label for="textfield"><strong>Email: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $Email_ID ?> </label>
      </td>
    </tr>
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Department: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $department ?> </label>
      </td>
    </tr>
    
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Degree Earned: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $Degree  ?>  </label>
      </td>
    </tr>
    <tr>
      <td align="left">
        <label for="textfield"><strong>Graduation Year: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $Graduated_year  ?></label>
      </td>
    </tr>
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Date of Birth: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $DOB ?></label>
      </td>
    </tr>
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Address: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $Address ?></label>
      </td>
    </tr>
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Contact No.: </strong> </label>
      </td>
	  <td >
        <label for="textfield"><?php echo $Ph_No?></label>
      </td>
    </tr>
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Marital Status: </strong></label>
      </td>
	  <td >
        <label for="textfield"><?php echo $Marital_Status?></label>
      </td>
    </tr>
    <tr>
      <td align="left">
        <strong>Fundings Made: </strong>
      </td>
    </tr>
    
  </table>
  </div>
  <table border="1" align ="center" cellpadding="2" >
  <tr>
    <td>
    <strong>Organization Name/ Project Name</strong>
    </td>
    <td>
    <strong>Amount Donated</strong>
    </td>
  <tr/>
 <?php 
 $query = "select a.Activity_Name, a.Fund_Raising_Amount  from activity a, alumni_involved_activity ai, alumni al where a.Activity_Id = ai.Activity_Id and ai.Alumni_Id = al.Alumni_Id and al.Person_id = '$Person_ID'";
//echo $query;
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
 
  <br/>
  <br/>
<center><input name="submit" type="button" value="Upload Info" onclick= "document.location.href = 'Upload_Comments.php'"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="submit" type="button" value="Delete Account" onclick="return confirmdelete();" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="submit" type="button" value="Edit" onclick= "document.location.href = 'alumni_edit_profile.php'"/></center>
 <footer>
		<div class="wrapper"></div>
	</footer>   


</form>

</body>
</html>