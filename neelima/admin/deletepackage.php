<?php
										require "connect.php";
										
										$qury="UPDATE tbl_package SET status='0' where package_id=".$_GET['id'];
			                            $obj=mysqli_query($con,$qury);
										header("location: viewpackage.php");
										?>