<?php
	require "connect.php";
										
	$qury="UPDATE tbl_servicesbooking SET `approve`='0' WHERE servicesbooking_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewapprovedservicesbooking.php");
?>