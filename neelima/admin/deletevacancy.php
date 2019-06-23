<?php
	require "connect.php";
										
	$qury="UPDATE tbl_vacancy SET `status`='0' WHERE vacancy_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewvacancy.php");
?>