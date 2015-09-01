<?php

if(!isset($_POST["F_Name"])) {
$message = " First Name field is required";
}
if(!isset($_POST["M_Init"])) {
$message = " Middle Name field is required";
}
if(!isset($_POST["L_Name"])) {
$message = " Last Name field is required";
}
if(!isset($_POST["Email_Id"])) {
$message = " Email ID field is required";
}
if(!isset($_POST["User_Id"])) {
$message = " User Name field is required";
}
if(!isset($_POST["Password"])) {
$message = " Password field is required";
}

?>