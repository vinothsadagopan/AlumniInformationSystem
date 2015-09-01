<?php include 'dbconnect.php'?>
<?php 
$Person_ID = $_COOKIE['Person_ID'];
$projectname= $_POST['projectname1'];
$amount = $_POST['amount1'];
$query= "insert into activity(Activity_Name,Activity_Type, Fund_Raising_Amount,Fund_Raised_for_Project, Description) values ('$projectname','Fund Raising', '$amount','$amount','Software Development')";
$result = mysql_query($query);
$query = "select Activity_id from activity where Activity_Name= '$projectname'";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)) {
$Activity_id = $row['Activity_id'];
}
$query = "select Alumni_ID from alumni where Person_ID ='$Person_ID'";
$result = mysql_query($query);
while($row = mysql_fetch_array($result)) {
$Alumni_ID = $row['Alumni_ID'];
}
$query = "insert into alumni_involved_activity values ('$Alumni_ID','$Activity_id')";
$result = mysql_query($query);
echo "<tr><td>'$projectname'</td><td>'$amount'</td></tr>";
?>