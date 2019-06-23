<?php
session_start();
include 'connect.php';
if ($_SESSION['userLogin'] != 'active')
{
    include 'header.php';
    header('location:index.php');
}
else
{
    include 'userheader.php';
}
?>

        <body>
                <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Booking</h2>
						<div class="page_link">
							<a href="">Home</a>
							<a href="">Booking</a>
						</div>
					</div>
				</div>
            </div>
        </section>

       

         <div class="whole-wrap">
				<div class="container">
					
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<h3 class="mb-30 title_color">Booking</h3>
								<form name="form1"  method="POST" action="bookaction.php" id="form" enctype="multipart/form-data">
									<input type="hidden" name="cust_package">
									<div class="mt-10">Event Name:
										<input type="text" name="event1" id="event1" placeholder="Event1 Name"required class="single-input">
									</div>
                                    <div class="mt-10">Event1 Date:
										<input type="date" name="date" id="date" placeholder="Date"required class="single-input">
									</div>
									<div class="mt-10">Event1 Time:
										<input type="time" name="time" id="time" placeholder="Time"required class="single-input">
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">State:
											<select onChange="getdistrict(this.value);" name="state" id="state">
												<option value="">Select State</option>
												<?php $query =mysqli_query($con,"SELECT * FROM tbl_state");
												while($row=mysqli_fetch_array($query))
												{ ?>
												<option value="<?php echo $row['state_id'];?>"><?php echo $row['state_name'] ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">District:
											<select name="district" id="district-list">
												<option value="">Select</option>
											</select>
										</div>
									</div>
									<div class="mt-10">Event1 Location
										<input type="location" name="location" id="location" placeholder="Location"required class="single-input">
									</div>
									
									<div class="button-group-area mt-10">
                                            <a href="bookaction.php?id=<?php echo $packageid ?>" class="white_btn" style="clear:both; float:left; margin-top:10px;border: 3px solid yellow; cursor: pointer;" name="book">Book Now</a>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>



        <?php
include 'connect.php';
// if ($_SESSION['userLogin'] != 'active')
// {
//     header('location:index.php');
// }
// else {
//     $name = $_SESSION['name'];
//     $email = $_SESSION['email'];
if(isset($_GET['id'])) {
	if ($_SESSION['userLogin'] != 'active'){
		$email = $_SESSION['email'];
		$id = $_GET['id'];
		$query1 = "SELECT * FROM `tbl_package` WHERE package_id='$id'";
            $p = mysqli_query($con,$query1);
 
            
            }
            }
        
            ?>
           
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/theme.js"></script>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    </body>
</html>