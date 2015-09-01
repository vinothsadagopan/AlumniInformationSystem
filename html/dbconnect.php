<?php
$server = 'localhost';
$user = 'root';
$pass= '';
$db = 'alumnidb2';
 $connection = mysql_connect($server,$user,$pass) or die("Unable to connect");
 $database = mysql_select_db($db,$connection);


?>