<?php
	require "connect.php";
										
	$qury="UPDATE tbl_booking SET `approve`='0' WHERE booking_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewapprovedbooking.php");
?>