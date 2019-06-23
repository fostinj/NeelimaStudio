<?php
	require "connect.php";
										
	$qury="UPDATE tbl_subcategory SET `status`='0' WHERE subcategory_id=".$_GET['id'];
	$obj=mysqli_query($con,$qury);
	header("location: viewsubcategory.php");
?>