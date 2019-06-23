<?php
session_start();
include 'connect.php';
if ($_SESSION['userLogin'] != 'active')
{
    include 'header.php';
}
else
{
	include 'userheader.php';
}
?>
<!--================Home Banner Area =================-->
<section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Current Bookings</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="currentbookings.php">Current Bookings</a>
						</div>
					</div>
				</div>
            </div>
        </section>
<!--================End Home Banner Area =================-->
<div class="section-top-border">
						<h3 class="mb-30 title_color">My Bookings</h3>
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<!-- <div class="serial">#</div> -->
									<div class="serial">#</div>
									<div class="serial">Package</div>
									<div class="serial">Category</div>
									<div class="serial">Booked Date</div>
									<div class="serial">Booked Time</div>
									<div class="serial">Location</div>
									<div class="serial">Booked On</div>
									<!-- <div class="percentage">Description</div> -->
								</div>
                                <?php
                                    // Include config file
                                    require_once "connect.php";
                    
                                    // Attempt select query execution
                                    $sql = "SELECT tbl_booking.*,tbl_package.*,tbl_category.* FROM tbl_booking,tbl_package,tbl_category WHERE tbl_booking.package_id=tbl_package.package_id AND tbl_booking.category_id=tbl_category.category_id AND tbl_booking.status='1' AND tbl_booking.approve='0' ORDER BY tbl_booking.date1 DESC";
                                    $result=mysqli_query($con,$sql);
                                    $rowcount = 1;
                                    while($row=mysqli_fetch_array($result))
                                        {
                                            $package_id=$row['package_id'];
                                        ?>
                                    <form method="post" action="#" >

								<div class="table-row">
									<div class="serial"><?php echo $rowcount ?></div>
									<div class="serial"><?php echo $row['package_name'] ?></div>
									<div class="serial"><?php echo $row['category_name'] ?></div>
									<div class="serial"><?php echo $row['date1'] ?></div>
									<div class="serial"><?php echo $row['time1'] ?></div>
									<div class="serial"><?php echo $row['location1'] ?></div>
									<div class="serial"><?php echo $row['created_at'] ?></div>
						            <!-- <a href="#" class="genric-btn success circle">Apply</a> -->
									
            						<td><a href="cancelbooking.php?id=<?php echo $row['package_id'] ?>" class="genric-btn danger circle">Cancel</a></td>
								</div>
                                </form>
								<?php
                                 $rowcount++;
                                        }
                                        ?>
							</div>
                           
						</div>
                        
					</div>
<?php
include 'footer.php';
?>