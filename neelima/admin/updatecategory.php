<?php
										require "connect.php";
										
										// print_r($_POST);
										if(isset($_POST['submit']))
										{
										$category_id=$_POST['category_id'];
										$category_name=$_POST['category_name'];
										echo $qury="update tbl_category set category_name='$category_name' where category_id='$category_id'";
										// die();
			                            $obj=mysqli_query($con,$qury);
										header("location: viewcategory.php");
										}
										?>