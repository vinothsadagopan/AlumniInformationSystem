<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php include 'dbconnect.php'?>

<?php

$Person_ID = 4;





$query = "select concat(L_Name ,' ', F_Name) as Name, Email_Id, DOB, Address,Location,Ph_no, Marital_Status,photo from Person where Person_Id ='$Person_ID'";
$result = mysql_query($query);
$Name = "";
$Email_ID = "";
$DOB = "";
$Address ="";
$Location = "";
$Ph_No = "";
$Marital_Status = "";
$profile_pic = "";
$Faculty_Id = "";
$User_Name = "";
$Password = "";

while($row = mysql_fetch_array($result)) {
  $Name = $row['Name']; 
  $Email_ID = $row['Email_Id'];
  $DOB = $row['DOB'];
  $Address = $row['Address'];
  $Location = $row['Location'];
  $Ph_No = $row['Ph_no'];
  $Marital_Status = $row['Marital_Status'];
  $profile_pic = $row['photo'];
}

$query = "select f.Facuty_id from faculty f where  f.Person_Id = '$Person_ID'";
$result = mysql_query($query);
//$Faculty_Id = $result;
while($row = mysql_fetch_array($result)) {
$Faculty_Id = $row['Facuty_id'];
}


$query = "select l.User_Id,l.Password from login_credentials l where  l.Person_Id = '$Person_ID'";
$result = mysql_query($query);
//$Faculty_Id = $result;
while($row = mysql_fetch_array($result)) {
$User_Name = $row['User_Id'];
$Password = $row['Password'];
}

 ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Faculty Edit Profile</title>
<link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/alumni.css">
</head>
<body background="green-design.jpg">

  <?php include 'header.php'; ?>

  <?php include 'sidebar.php'; ?>

  <section>
    <div class="wrapper">
      <div id="main">
<form id="form1" name="form1" action="faculty_profile_processor.php" method="post" enctype="multipart/form-data">
<h2 align="center"><u>Faculty Edit Profile</u></h2>


<div>
  <img src="<?php echo $profile_pic ?>" style="width:200px;height:200px;float:right">
  <input type="hidden" name="MAX_FILE_SIZE" value="524288" />
  <input name="userfile" type="file" class="file" multiple="true" data-show-upload="false" data-show-caption="true">
  
  <table  align="center" id="pInfo" cellpadding="4" style="float:left">
        <tr>
      <td align="left">
        <label for="label"><strong>Name: </strong></label>
      </td>
      <td align="left">
        <input type="text" name="faculty_name" value="<?php echo $Name ?>" />
     </td>
    </tr>
 <tr>
      <td align="left">
        <label for="label"><strong>Username: </strong></label>
      </td>
      <td align="left">
        <input type="text" name="Username" value="<?php echo $User_Name ?>"/>
     </td>
    </tr>
<tr>
<tr>
   <td align="left">
        <label for="label"><strong>Password: </strong></label>
   </td>
   <td align="left">
        <input type="password" name="Password" value="<?php echo $Password ?>"/>
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Email: </strong></label>
   </td>
   <td align="left">
        <input name="email_id" value="<?php echo $Email_ID ?>" type="text">
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Department: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="Department" />
   </td>
</tr>

<tr>
   <td align="left">
        <label for="label"><strong>Office: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="office" />
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Address: </strong></label>
   </td>
   <td align="left">
        <textarea rows="3" cols="30" name="address"><?php echo "$Address, $Location" ?></textarea>
   </td>
</tr>
<tr>
   <td align="left">
        <label for="label"><strong>Contact No.: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="ph_no" value="<?php echo $Ph_No; ?>" />
   </td>
</tr>

<tr>
   <td align="left">
        <label for="label"><strong>Marital Status: </strong></label>
   </td>
   <td align="left">
        <input type="text" name="marital_status" value="<?php echo $Marital_Status?>" />
   </td>
</tr>
     </table>
     
     <br/>
     <br/>
     <br/>
        <center style="clear:both"><input type="submit" name="edit_submit" value="Save"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="Cancel" value="Cancel"/>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </center>
    
  

  
    <section/> 
 
</form>
<footer>
    <div class="wrapper"></div>
  </footer>


</body>
</html>