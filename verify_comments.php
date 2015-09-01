<html>
<head>
<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/alumni.css">
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","","alumnidb2");
$id = $_POST['nextid'];
$sql = "SELECT * FROM upload_info where Sending_Person_Id = $id"; 
$q = mysqli_query ($con, $sql); 	
	while($row = mysqli_fetch_array($q))
	{
		$sender_id = $row['Sending_Person_Id'];
		$alumni_id = $row['Receiving_Person_Id'];
		$is_approved = $row['is_approved'];
		$info = $row['Info'];
		$upload_pic = $row['upload_pic'];
		
	}
	$sql2 = "Select F_name FROM person where Person_id = $sender_id";
	$q2 = mysqli_query ($con, $sql2);
	while($row2 = mysqli_fetch_array($q2))
	{
	$sender_name = $row2['F_name'];
	}
?>
</br>
</br>
<table width="100%" border="0" cellspacing="0" cellpadding="15">
      <tbody>
        <tr>
          <td width="30%" valign = "top">
		  <img src ="<?php echo $upload_pic; ?>" height = 400 width = 400 >
		  </td>
          <td width="60%" valign = "top">
		  <p>Sender: <?php echo $sender_name; ?>
		  </p>
		  <p>Comment: <?php echo $info; ?>
		  </p>
		  <form id="form1" name="form1" method="post" action="verify_update_comments.php">
			<input type="hidden" name="nextid" id="nextid" value = "<?php echo $sender_id;?>">
			<input type="hidden" name="nextid2" id="nextid2" value = "<?php echo $alumni_id;?>">
			<input type="submit" class = "button" name="button" id="button" value = "Verify">
		</form>
		</br>
     <form id="form1" name="form1" method="post" action="verify_delete_comments.php">
			<input type="hidden" name="deleteid" id="deleteid" value = "<?php echo $sender_id;?>">
			<input type="hidden" name="deleteid2" id="deleteid2" value = "<?php echo $alumni_id;?>">
			<input type="submit" class = "button" name="button2" id="button2" value = "Delete">
		</form>
		</tr>
		</tbody>
	</table>
</body>
</html>
