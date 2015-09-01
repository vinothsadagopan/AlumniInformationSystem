<?php
$con = mysqli_connect("localhost", "root", "", "alumnidb2");
$id = $_POST['deleteid'];
$receiver_id = $_POST['deleteid2'];
$query = mysqli_query($con, "DELETE FROM upload_info WHERE Sending_Person_Id = $id AND Receiving_Person_id = $receiver_id");
echo '<script type="text/javascript">alert("Comment successfully removed from your profile!!")</script>';
include 'alumnihome.php';

?>