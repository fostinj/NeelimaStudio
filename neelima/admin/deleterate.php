<?php
	require "connect.php";
										
	$qury="UPDATE tbl_rate SET `status`='0' WHERE rate_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewrates.php");
?>