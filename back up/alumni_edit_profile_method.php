<?php include 'dbconnect.php'?>
<?php
	$Person_Id = $_POST['personid']; 
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
//$query = "update person set F_Name = '$FirstName', L_Name = '$LastName', Email_Id = '$Email_ID', DOB= '$DOB', Address ='$Address', Ph_no ='$Ph_No', Marital_Status ='$Marital_Status' where Person_Id ='$Person_Id'";
//$result = mysql_query($query);
//$department = $_POST ['Department'];
//$Graduated_year = $_POST['graduationyear'];
//$Degree = $_POST['degree'];
//$query = "update alumni set degree = '$Degree', Graduated_year = '$Graduated_year',Department_Id = (select  Dept_Id from Department where Dept_Name = '$department') where Person_Id ='$Person_Id'";
//$result = mysql_query($query);
//$query = "update alumni set Department_Id = (select  Dept_Id from Department where Dept_Name = '$department') where Person_Id ='$Person_Id' ";
//$result = mysql_query($query);
?>