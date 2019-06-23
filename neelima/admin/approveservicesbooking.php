<?php
	require "connect.php";
										
	$qury="UPDATE tbl_servicesbooking SET `approve`='1' WHERE servicesbooking_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewunapprovedservicesbooking.php");
?>