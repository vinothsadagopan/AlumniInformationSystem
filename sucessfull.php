<?php
$firstname = $_POST['F_Name'];
$middlename = $_POST['M_Init'];
$lastname = $_POST['L_Name'];
$emailid = $_POST['Email_Id'];
$username = $_POST['User_Id'];
$password = $_POST['Password'];

$server = 'localhost';
$user = 'root';
$pass= '';
$db = 'alumnidb2';
$connection = mysql_connect($server,$user,$pass) or die("Unable to connect");
$database = mysql_select_db($db,$connection);
 
$regflag = $_POST['Reg_flag'];
//$personid = $_POST['Person_Id'];

$regflag =1; 

$sql="INSERT INTO person(F_Name, M_Init, L_Name, Email_Id, Reg_flag) VALUES ('$firstname','$middlename','$lastname','$emailid', '$regflag')";
$exec=mysql_query($sql,$connection);

if (!mysql_query($sql,$connection))
  {
  die('Error: ' . mysql_error());
  }
  
$sql = "SELECT MAX(Person_Id) From person";
$exec=mysql_query($sql);
while($row = mysql_fetch_array($exec)) {
	$personid = $row[0];
}

$sql1="INSERT INTO login_credentials(User_Id, Password, Person_Id ,Reg_flag) VALUES ('$username', '$password','$personid', '$regflag')";
$exec=mysql_query($sql1,$connection);

echo "Data entered successfully";
?>

<html>
<body>
Login Successful
</body>
</html>
