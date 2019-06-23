<?php
require_once('PHPMailer/PHPMailerAutoload.php');
$mail=new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth();
$mail->SMTPSecure='ssl';
$mail->Host 'smtp.gmail.com';
$mail->Port='587';
$mail->isHTML();
$mail->Username='faustinjacob@gmail.com';
$mail->Password='pochappan';
$mail->SetFrom('neelimapodimattom@gmail.com');
$mail->Subject='Package Booking';
$mail->Body='Thank you for Booking';
$mail->ADDAddress('fostinj@gmail.com');
$mail->Send();	
?>