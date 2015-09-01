<?php

$Alumni_Id = 4;
$User_ID = 8;

$con=mysqli_connect("localhost","root","","alumnidb2");
$comment = $_POST['textmsg'];
            $imgName = "./"."AdImages/".$_FILES['userfile']['name'];
            if(isset($_POST['upload'])) 
			{

            $allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
            $max_filesize = 1048570060;
            $upload_path = 'AdImages/';

            
            $filename = $_FILES['userfile']['name'];
            $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

            if(!in_array($ext,$allowed_filetypes))
			{
			mysqli_query($con, "INSERT INTO upload_info(Sending_Person_Id, Receiving_Person_Id, Info) VALUES ($User_ID, $Alumni_Id, '$comment')") or die(mysqli_error($con));
			echo '<script type="text/javascript">alert("Upload Successful")</script>';
			        include 'upload_comments.php';
			die();
			}

            if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
              die('The file you attempted to upload is too large.');

            if(!is_writable($upload_path))
              die('You cannot upload to the specified directory, please CHMOD it to 777.');

            if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) {
            } 
            }
mysqli_query($con, "INSERT INTO upload_info(Sending_Person_Id, Receiving_Person_Id, Info, upload_pic) VALUES ($User_ID, $Alumni_Id, '$comment', '$imgName')") or die(mysqli_error($con));
echo '<script type="text/javascript">alert("Upload Successful")</script>';
include 'upload_comments.php';

?>
