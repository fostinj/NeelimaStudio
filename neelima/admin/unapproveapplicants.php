<?php
	require "connect.php";
										
	$qury="UPDATE tbl_jobapplicants SET `approve`='0' WHERE applicants_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewapprovedapplicants.php");
?>