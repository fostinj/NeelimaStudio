<?php
										require "connect.php";
										
										// print_r($_POST);
										if(isset($_POST['submit']))
										{
										$package_id=$_POST['package_id'];
										$package_name=$_POST['package_name'];
										$type=$_POST['package_type'];
										$video=$_POST['video'];
										$photo=$_POST['photo'];
										$rate=$_POST['package_rate'];
										$category=$_POST['category_id'];
										$religion=$_POST['religion_id'];
										echo $qury="update tbl_package set package_name='$package_name',type='$package_type',video='$video',photo='$photo',rate='$rate',category='$category',religion='$religion' where category_id='$category_id'";
										// die();
			                            $obj=mysqli_query($con,$qury);
										header("location: viewpackage.php");
										}
										?>