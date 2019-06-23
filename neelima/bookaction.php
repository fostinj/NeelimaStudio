<?php
session_start();
include 'connect.php';
if ($_SESSION['userLogin'] != 'active')
{
	echo"<script>alert('Please Login to Continue Booking');</script>";
     echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";
}
else
{
	if(isset($_POST['book']))
	{
		$e1=$_POST["event1"];
		$d1=$_POST["date1"];
		$t1=$_POST["time1"];
		$l1=$_POST["location1"];
		$m1=$_POST["message1"];
		$e2=$_POST["event2"];
		$d2=$_POST["date2"];
		$t2=$_POST["time2"];
		$l2=$_POST["location2"];
		$m2=$_POST["message2"];
		$e3=$_POST["event3"];
		$d3=$_POST["date3"];
		$t3=$_POST["time3"];
		$l3=$_POST["location3"];
		$m3=$_POST["message3"];

		$sql2="select * from `tbl_package` where package_id=".$_GET['id'];
		$obj=mysqli_query($con,$sql);
    	while($row = mysqli_fetch_array($obj))
    	{
			$packageid=$row['package_id'];
		}
		$sql="insert into `tbl_booking` (`login_id`,`package_id`,`event1`, `date1`, `time1`,`location1`,`message1`,`event2`, `date2`, `time2`,`location2`,`message2`,`event3`, `date3`, `time3`,`location3`,`message3`,`status` ) values ('$id','$packageid','$e1','$d1','$t1','$l1','$m1','$e2','$d2','$t2','$l2','$m2','$e3','$d3','$t3','$l3','$m3','1')";
		$result3=mysqli_query($con,$sql);
        
        echo"<script>alert('Registration Successfull');</script>";
        echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";
				
	}
}
?>
 