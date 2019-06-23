<?php
include("connect.php");
$email=$_POST["email"];
$sql="SELECT * FROM tbl_login WHERE email='$email'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "fostinjacob@gmail.com";
  $mail->Password = "pochappan";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "fostinjacob@gmail.com";
  $mail->FromName = "NEELIMA";
  
  $mail->addAddress($row["email"]);
  
  $mail->isHTML(true);
 if($email==$row["email"])
 {
  $mail->Subject = "test mail";
  $mail->Body = "<i>this is your password:</i>".$row["password"];
  $mail->AltBody = "This is the plain text version of the email content";
  
  if(!$mail->send())
  {
   echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
	 
   echo "Message has been sent successfully";
  }
  echo"<script>alert('sucessful');
 
    document.location=('index.php');
    </script>";
}
else{
    echo"<script>alert('invalid email');
 
    document.location=('index.php');
    </script>";
   
 
}