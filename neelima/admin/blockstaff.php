<?php
										require "connect.php";
										
										$qury="UPDATE tbl_login SET `status`='0' where login_id=".$_GET['id'];
			                            $obj=mysqli_query($con,$qury);
										header("location: viewstaff.php");
										?>