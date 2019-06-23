<?php
										require "connect.php";
										
										$qury="delete from tbl_category where category_id=".$_GET['category_id'];
			                            $obj=mysqli_query($con,$qury);
										header("location: viewcategory.php");
										?>