<?php
//insert.php
if(isset($_POST["subject"]))
{
 include("connect.php");
 $subject = mysqli_real_escape_string($con, $_POST["subject"]);
 $comment = mysqli_real_escape_string($con, $_POST["comment"]);
 $query = "
 INSERT INTO tbl_notification(notification_subject, notification_text)
 VALUES ('$subject', '$comment')
 ";
 mysqli_query($con, $query);
}
?>