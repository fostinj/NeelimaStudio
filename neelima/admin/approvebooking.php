<?php
	require "connect.php";
										
	$qury="UPDATE tbl_booking SET `approve`='1' WHERE booking_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewunapprovedbooking.php");
?>