<?php
	require "connect.php";
										
	$qury="UPDATE tbl_jobapplicants SET `approve`='1' WHERE applicants_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewunapprovedapplicants.php");
?>