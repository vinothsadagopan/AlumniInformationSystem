<?php include 'dbconnect.php'?>
<?php 
$Person_ID = $_COOKIE['Person_ID'];
$User_ID = $_COOKIE['User_ID'];
$query = "delete from person where Person_ID = '$Person_ID'";
$result = mysql_query($query);
header("Location:login.php");

?>
