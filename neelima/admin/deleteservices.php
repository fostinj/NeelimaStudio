<?php
	require "connect.php";
										
	$qury="UPDATE tbl_services SET `status`='0' WHERE services_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewservices.php");
?>