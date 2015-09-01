<?php
ob_start();
session_start();

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="alumnidb2"; // Database name 
$tbl_name="login_credentials"; // Table name 

// Connect to server and select database.
$connect=mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name", $connect)or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['User_Id']; 
$mypassword=$_POST['Password']; 

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE User_Id='$myusername' and Password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
if($count==0) {
	echo "Incorrect Username or Password";
	header("location:login.php");
	}
else{
	$userData = mysql_fetch_array($result, MYSQL_ASSOC);

	session_regenerate_id();
	$_SESSION['sess_user_id'] = $userData['Login_Id'];
	$_SESSION['sess_username'] = $userData['User_Id'];
	session_write_close();
	header('Location: alumnihome.php');
	}
?>