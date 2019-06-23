<?php
										require "connect.php";
										
										// print_r($_POST);
										if(isset($_POST['submit']))
										{
										$ureg_id=$_POST['uid'];
										$first_name=$_POST['fname'];
										$last_name=$_POST['lname'];
										$mobile=$_POST['mobile'];
										echo $qury="update tbl_ureg set first_name='$first_name',last_name='$last_name',mobile='$mobile' where ureg_id='$ureg_id'";
										// die();
			                            $obj=mysqli_query($con,$qury);
										header("location: edituser.php");
										}
										header("location: viewuser.php");
										?>