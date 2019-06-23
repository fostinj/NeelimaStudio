<?php
session_start();
$loginid=$_SESSION['login_id'];
$connect = mysqli_connect("localhost", "root", "", "mainproject");
$packageid=$_POST['package_id'];
$event = count($_POST['event']);
$date = count($_POST["date"]);
$location = count($_POST["location"]);
// $sql2="select * from `tbl_booking` where package_id='$packageid' and login_id='$loginid'";
// 	$result2=mysqli_query($connect,$sql2)or die(mysql_error());
// 	$arr=mysqli_fetch_array($result2);
// 	if(mysqli_num_rows($result2) > 0)
// 	{
// 		echo"Package Already Booked..!!";
//     }
//     else
//     {
if($event > 1 && $date > 1 && $location > 1)
{
	for($i=0; $i<$event; $i++)
		{
		for($i=0; $i<$date; $i++)
		{
			for($i=0; $i<$location; $i++)
			{
				
		if(trim($_POST["event"][$i] != '') && trim($_POST["date"][$i] != '') && trim($_POST["location"][$i] != ''))
		{
			$sql = "INSERT INTO tbl_booking(package_id,login_id,event,date,location,status) VALUES('$packageid','$loginid','".mysqli_real_escape_string($connect, $_POST["event"][$i])."','".mysqli_real_escape_string($connect, $_POST["date"][$i])."','".mysqli_real_escape_string($connect, $_POST["location"][$i])."','1')";
			mysqli_query($connect, $sql);
			
		}
    }
}


}
	echo "Booking Added.!!Confirmation will be send to your registered Mail.";
}
else
{
	echo "Enter Details...!!Please Click Add More Button to fill all Details";
}
?>
