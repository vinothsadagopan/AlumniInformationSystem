<?php
session_start();
echo $_SESSION['sess_user_id'];
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_username']) || (trim($_SESSION['sess_username']) == '')) {
	header("location: login.php");
	exit();
} 
?>

<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8" />
	<title>UNCC Alumni</title>
		<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/alumni.css">
</head>

<body>
<?php include 'header.php'; ?>

	<?php include 'sidebar.php'; ?>

	<section>
		<div class="wrapper">
			<div id="main">
			<div id="logout">
		<form action="logout.php">
			<input class="button" name="submit" id="submit" tabindex="5" value="Logout" type="submit"> 
		</form>
		</div>
				<form action="SearchAction.php">
					Search: <input type="text" />
					<select name="selectCategory" id="">
						<option value="student">Student</option>
						<option value="faculty">Faculty</option>
					</select>
				</form>
				<br>
				<br>
				<div class="panel panel-default">
                  <div class="panel-heading"><h4>New Requests</h4></div>
                  <div class="panel-body">
                    <div class="list-group">
<?php
$con=mysqli_connect("localhost","root","","alumnidb2");
$username = $_SESSION['sess_username'];

$sql = "SELECT * FROM login_credentials where User_Id = '$username'"; 
$q = mysqli_query ($con, $sql); 	
	while($row = mysqli_fetch_array($q))
	{
		$Receiving_Person_Id = $row['Person_Id'];
	}

$sql = "SELECT * FROM upload_info where Receiving_Person_Id = $Receiving_Person_Id"; 
$q = mysqli_query ($con, $sql); 	
	while($row = mysqli_fetch_array($q))
	{
		$sender_id = $row['Sending_Person_Id'];
		//$alumni_id = $row['Receiving_Person_Id'];
		$is_approved = $row['is_approved'];
	$sql2 = "Select F_name FROM person where Person_id = $sender_id";
	$q2 = mysqli_query ($con, $sql2);
	while($row2 = mysqli_fetch_array($q2))
	{
	$sender_name = $row2['F_name'];
	}
?>	
<?php
	if($is_approved == 0)
	{
?>
   <form id="form1" name="form1" method="post" action="verify_comments.php">
<input type="hidden" name="nextid" id="nextid" value = "<?php echo $sender_id;?>">

<?php echo " ".$sender_name. " posted a comment on your profile"; ?>
</br>
<input type="submit" name="button" id="button" value = "Details" class = "button">	
</form>
   
<?php
	}
	}
?>    
	</div>
                  </div>
              </div>
			</div>
		</div>
	</section>


	<div id="footer">
		<footer> 
            <p>&copy; UNCC</p>
        </footer>
	</div>
</body>

</html>