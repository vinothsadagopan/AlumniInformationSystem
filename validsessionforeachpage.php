<?php

if ($_GET['action'] == 'succeed') {  
	echo 'Logged successfully';
	header('Refresh: 2; URL=alumnihome.php');
}

else if ($_GET['action'] == 'logout') {
	session_unset();
	session_destroy();
	echo 'Logged out.';
	header('Refresh: 2; URL=login.php');
}

else if ($_GET['action'] == 'timeover') {
  session_unset();
  session_destroy();
  echo 'You have been logged out for inactivity';
  header('Refresh: 2; URL=login.php');
}

?>