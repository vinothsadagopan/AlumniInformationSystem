<?php
require 'PHPMailerAutoload.php';

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
$mail->SMTPDebug  = 1;  
$email="conferenceproj@outlook.com"     ;                // SMTP password
                           // Enable TLS encryption, `ssl` also accepted
                            // TCP port to connect to

$mail->From = 'jebancool@gmail.com';
$mail->FromName = 'Mailer';
$mail->addAddress($email, '$Chud=chan');     // Add a recipient
              // Name is optional
$mail->addReplyTo('jebancool@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'phpmailer test';
$mail->Body    = 'If you get this, <b>it works!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
