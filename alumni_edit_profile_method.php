<?php include 'dbconnect.php'?>
<?php
	$Person_Id = $_POST['personid']; 
	//echo $Person_Id;
	$FirstName = $_POST['firstname'];
	$LastName =$_POST['lastname'] ;
	$Email_ID =$_POST['email'] ;
	$DOB = $_POST['dateofbirth'];
	$Address = $_POST['address'];
	$Ph_No = $_POST['contactno'];
	$Marital_Status =$_POST['status'] ;
	$department =$_POST['Department'] ;
$Graduated_year =$_POST['degree'] ;
$Degree = $_POST['graduationyear'];
//echo $Person_Id;
//echo $department;
$query = "update person set F_Name = '$FirstName', L_Name = '$LastName', Email_Id = '$Email_ID', DOB= '$DOB', Address ='$Address', Ph_no ='$Ph_No', Marital_Status ='$Marital_Status' where Person_Id ='$Person_Id'";
$result = mysql_query($query);
$department = $_POST ['Department'];
$Graduated_year = $_POST['graduationyear'];
$Degree = $_POST['degree'];
$query = "update alumni set degree = '$Degree', Graduated_year = '$Graduated_year',Department_Id = (select  Dept_Id from Department where Dept_Name = '$department') where Person_Id ='$Person_Id'";
$result = mysql_query($query);
$query = "update alumni set Department_Id = (select  Dept_Id from Department where Dept_Name = '$department') where Person_Id ='$Person_Id' ";
$result = mysql_query($query);


            
			 $imgName = "./"."AdImages/".$_FILES['userfile']['name'];
			 //echo $imgName;
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
            
			$query = "update person set photo='$imgName' where Person_ID = '$Person_Id'";
			//echo $query;
			$result = mysql_query($query);
//mysqli_query($con, "INSERT INTO upload_info(Sending_Person_Id, Receiving_Person_Id, Info, upload_pic) VALUES ($User_ID, $Alumni_Id, '$comment', '$imgName')") or die(mysqli_error($con));
//echo '<script type="text/javascript">alert("Upload Successful")</script>';
 header("Location:alumni_profile.php");

//exit;
?>