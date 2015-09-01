<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php include 'dbconnect.php'?>

<?php

setcookie('User_ID','user');  // Hard Coding cookie values for temporary basis
setcookie('Person_ID','1');     // Hard Coding cookie values for temporary basis
$Person_ID_cookie = $_COOKIE['Person_ID'];
$User_ID = $_COOKIE['User_ID'];
$counter =0;
if(isset($_GET['person_id'])){
	$Person_ID = $_GET['person_id'];
	//echo $Person_ID;
	$counter = 1;
}
else {
$Person_ID = $_COOKIE['Person_ID'];
}


$query = "select concat(L_Name ,' ', F_Name) as Name, Email_Id, DOB, Address,Location,Ph_no, Marital_Status,photo from Person where Person_Id ='$Person_ID'";
$result = mysql_query($query);


$Name = "";
$Email_ID = "";
$DOB = "";
$Address = "";
$Location = "";
$Ph_No = "";
$Marital_Status = "";
$profile_pic = "";
$Faculty_Id = "";
$User_Name = "";


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

$query = "select l.User_Id from login_credentials l where  l.Person_Id = '$Person_ID'";
$result = mysql_query($query);
//$Faculty_Id = $result;
while($row = mysql_fetch_array($result)) {
$User_Name = $row['User_Id'];
}


 ?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Faculty Profile</title>
<link rel="stylesheet" href="css/alumni.css">
<link rel="stylesheet" href="css/main.css">
<script type="text/javascript">
function DeleteWithCheck() {
    if (confirm("Are you sure you want to delete the faculty profile "))
    {
      alert("ok");    
    }       
}

function change_URL(){
  document.location.href = 'editfacultyprofile.php';
  return true;
}
</script>
</head>
<body background="green-design.jpg" >
 <?php include 'header.php'; ?>

  <?php include 'sidebar.php'; ?>

  <section>
    <div class="wrapper">
      <div id="main">
<h2 align="center"><u>Faculty Profile</u></h2>



<div>
  <img src="<?php echo $profile_pic ?>" style="width:200px;height:200px;float:right">
  <table  align="center" id="pInfo" cellpadding="4">
  
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
        <label for="textfield"><strong>User Name: </strong></label>
      </td>
    <td >
        <label for="textfield"><?php echo $User_Name ?></label>
      </td>
    </tr>
  
  <tr>
      <td align="left">
        <label for="textfield"><strong>Faculty Id: </strong></label>
      </td>
    <td >
        <label for="textfield"><?php echo $Faculty_Id ?></label>
      </td>
    </tr>
    
     <tr>
      <td align="left">
        <label for="textfield"><strong>Email: </strong></label>
      </td>
    <td >
        <label for="textfield"><?php echo $Email_ID ?></label>
      </td>
    </tr>
    
    <tr>
      <td align="left">
        <label for="textfield"><strong>Department: </strong></label>
      </td>
    <td >
        <label for="textfield">Computer Science </label>
      </td>
    </tr>
    <tr>
      <td align="left">
        <label for="textfield"><strong>Office: </strong></label>
      </td>
    <td >
        <label for="textfield">Woodward Hall 230</label>
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
        <label for="textfield"><?php echo $Address ?>, <?php echo $Location ?></label>
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
        <label for="textfield"><strong>Marital Status: </strong> </label>
      </td>
    <td >
        <label for="textfield"><?php echo $Marital_Status?></label>
      </td>
    </tr>
  </table>
  </div>
  <br/>
  <br/>
  <br/>
<center>
<?php
if ($counter == 0){
?>
<input name="submit1" type="submit" value="Delete" onclick="DeleteWithCheck()" class="button"/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="submit2" type="submit" value="Edit" onclick="return change_URL()" class="button"/></center>
 <?php
 }
 ?>



</body>
</html>