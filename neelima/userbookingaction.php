<?php
include 'connect.php';
session_start();
$id = $_SESSION['login_id'];

if(isset($_POST['book']))
{
    $category=$_POST["category_id"];
	$d1=$_POST["date1"];
	$t1=$_POST["time1"];
    $l1=$_POST["location1"];
    $package_id = $_POST['package_id'];
    $logid = $id;

    $sql2="select * from `tbl_booking` where login_id='$logid' AND package_id='$package_id'";
	$result2=mysqli_query($con,$sql2)or die(mysql_error());
	$arr=mysqli_fetch_array($result2);
	if(mysqli_num_rows($result2) > 0)
	{
        echo"<script>alert('Booking request already send..!!')</script>";
        echo "<script type='text/javascript'>window.location.href = 'package.php'</script>";
	}
    else
        {
        $sql="INSERT INTO tbl_booking (`login_id`,`package_id`,`category_id`,`date1`,`time1`,`location1`,`status`) VALUES ('$logid','$package_id','$category','$d1','$t1','$l1','1')";
        $result=mysqli_query($con,$sql);
        if($result)
            {
            echo"<script>alert('Thank You for Booking..!! Neelima Studio will contact you!!')</script>";
            echo "<script type='text/javascript'>window.location.href = 'package.php'</script>";
            }
        else
            {
            echo"<script>alert('Request failed do to some error..!!')</script>";
            echo "<script type='text/javascript'>window.location.href = 'userbooking.php'</script>";
            }
    }
}

?>