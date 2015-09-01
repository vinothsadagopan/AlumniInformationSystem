<?php
$con = mysqli_connect("localhost", "root", "", "alumnidb2");
$id = $_POST['nextid'];
$receiver_id = $_POST['nextid2'];
$query = mysqli_query($con, "UPDATE upload_info SET is_approved = '1' WHERE Sending_Person_Id = $id AND Receiving_Person_id = $receiver_id");
echo '<script type="text/javascript">alert("Comment successfully posted on your profile!!")</script>';
include 'alumnihome.php';
?>