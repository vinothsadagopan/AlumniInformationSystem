<?php include 'dbconnect.php'?>
<?php 
$Person_ID = $_COOKIE['Person_ID'];
echo $Person_ID;
$User_ID = $_COOKIE['User_ID'];
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
			
			die();
			}

            if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
              die('The file you attempted to upload is too large.');

            if(!is_writable($upload_path))
              die('You cannot upload to the specified directory, please CHMOD it to 777.');

            if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) {
            } 
            }
			$query = "update person set photo='$imgName' where Person_ID = '$Person_ID'";
			$result = mysql_query($query);
//mysqli_query($con, "INSERT INTO upload_info(Sending_Person_Id, Receiving_Person_Id, Info, upload_pic) VALUES ($User_ID, $Alumni_Id, '$comment', '$imgName')") or die(mysqli_error($con));
echo '<script type="text/javascript">alert("Upload Successful")</script>';

?>
