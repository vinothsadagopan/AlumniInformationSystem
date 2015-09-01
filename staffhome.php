<?php include 'dbconnect.php'?>
<?php require 'PHPMailerAutoload.php';?>
<?php
session_start();
?>

<html>

<head>
	<meta charset="utf-8" />
	<title>UNCC Alumni</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/alumni.css">
	
</head>

<body>
<div class="wrapper">
	<img class="banner" src="images/bannerWithLogo.png" alt="UNCC Banner">
</div>
<nav class="wrapper">
		<div id="sidebar">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Alumni</a></li>
				<li><a href="#">News</a></li>
				<li><a href="#">Events</a></li>
				<li><a href="#">Donate</a></li>
			</ul>
		</div>
	</nav>

	<section>
		<div class="wrapper">
			<div id="main">
				<form  name="approveregistration" action="staffhome.php" method="POST">
					<input type="hidden" id  ="$tid" name="$tid"/>
					<input type="hidden" id="$lastname" name="$lastname"/>
					<table>
					<tbody>
					<tr id="header">
						<td>FirstName,LastName</td>
						<td>Status</td>
						<?php
						
							$sql = "SELECT Person_Id ,F_Name,L_Name, Reg_flag ,Email_Id FROM Person where Reg_flag=0"; 
							$q = mysql_query ( $sql); 	
							while($row = mysql_fetch_array($q))
							{
								$tid=$row['Person_Id'];
								$firstname = $row['F_Name'];
								$lastname = $row['L_Name'];
								$flag=$row['Reg_flag'];
								$email=$row['Email_Id'];
								$str=$firstname.$lastname;
								//echo $str;
								//echo $flag;
								if($flag == 0)
								{
						?>
									<tr>
										<td><?php echo $firstname,$lastname; ?></td>
										<td><input type="submit" name="<?php echo $tid; ?>" value="accept" onclick="document.getElementById('$tid').value='<?php echo $tid; ?>';">
										<input type="submit" name="<?php echo $tid; ?>" value="decline" onclick="document.getElementById('$lastname').value='<?php echo $tid; ?>';"></td>
									</tr>
						<?php 
								}
								if(isset($_POST['$tid']))
								{

									$sql = "UPDATE Person SET Reg_flag=1 where Person_Id='".$_POST['$tid']."'";
									//echo $sql;
									$r = mysql_query ($sql);
									$mysql="UPDATE login_credentials SET Reg_flag=1 where Person_Id='".$_POST['$tid']."'";
									$k=mysql_query($mysql);
									
								 	
									$mail = new PHPMailer;

							//$mail->SMTPDebug = 3;                               // Enable verbose debug output

									$mail->isSMTP();                                      // Set mailer to use SMTP
							// 2 = messages only

									$mail->SMTPAuth   = true;                  // enable SMTP authentication

									$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier

									$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server

									$mail->Port       = 465;
									$mail->Username = "ashwinsankar1309@gmail.com";
									$mail->Password = "viji12345";
									$mail->SMTPDebug  = 1;                       // SMTP password
// Enable TLS encryption, `ssl` also accepted
// TCP port to connect to

									$mail->From = 'conferenceproj@outlook.com';
									$mail->FromName = 'Mailer';
									$mail->addAddress($email,$firstname);     // Add a recipient
// Name is optional
									$mail->addReplyTo('$email', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

									$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
									$mail->isHTML(true);                                  // Set email format to HTML

									$mail->Subject = 'Alumni login credentials validation';
									$mail->Body    = 'The staff has evaluated your request and it has been accepted.You can now login using your login credentials';
									$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

									if(!$mail->send()) 
									{
									echo 'Message could not be sent.';
									echo 'Mailer Error: ' . $mail->ErrorInfo;
									} 	
									else
 									{
									//echo 'Message has been sent';
									}

								}
								if(isset($_POST['$lastname']))
								{
									
									$sql="DELETE From Person where Person_Id='".$_POST['$lastname']."'";
									
									$b=mysql_query($sql);
									$mysql="DELETE From login_credentials where Person_Id='".$_POST['$lastname']."'";
									
									$c=mysql_query($mysql);

								}
							}
 						
 						?> 
 						
						
					
						
						</tbody>
					</table>
					
				</form>
			</div>
		</div>
	</section>
</body>
</html>