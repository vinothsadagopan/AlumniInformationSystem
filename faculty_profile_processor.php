<?php include 'dbconnect.php'?>

<?php

$Person_ID = 4;

if(isset($_POST['edit_submit'])){
	$faculty_name=$_POST['faculty_name'];

	$token = strtok($faculty_name, " ");
	$lname =  $token;
	$token = strtok(" ");
	$fname = $token;

	$username = $_POST['Username'];
	$password = $_POST['Password'];

	$email_id=$_POST['email_id'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	
	$token = strtok($address, ", ");
	$address =  $token;
	$token = strtok(" ");
	$location = $token;
	
	$ph_no=$_POST['ph_no'];
	$marital_status=$_POST['marital_status'];

	$query = "UPDATE Person SET F_Name = '$fname',L_Name = '$lname', Email_Id = '$email_id', DOB = '$dob', Address = '$address',Location = '$location',Ph_no = '$ph_no', Marital_Status='$marital_status' where Person_Id ='$Person_ID'";
	$result = mysql_query($query);

	$query = "UPDATE login_credentials SET User_Id = '$username', Password='$password' where Person_Id ='$Person_ID'";
	$result = mysql_query($query);
	
	
	$allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
	$max_filesize = 1048570060;
	$upload_path = 'AdImages/';
	
	
	$filename = $_FILES['userfile']['name'];
	
	$imgName = "./"."AdImages/".$_FILES['userfile']['name'];
	
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
	
	if(in_array($ext,$allowed_filetypes))
	{
			
		$sql="UPDATE alumnidb2.Person SET photo ='$imgName' where Person_Id ='$Person_ID'";
		$ans = mysql_query($sql);
	
		echo '<script type="text/javascript">alert("Upload Successful")</script>';
		
			
	}
	
	if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
		die('The file you attempted to upload is too large.');
	
	if(!is_writable($upload_path))
		die('You cannot upload to the specified directory, please CHMOD it to 777.');
	
	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) {
	}
	
	header('Location: viewfacultyprofile.php');
}





?>