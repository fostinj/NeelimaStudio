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
	$loginId = $_SESSION['login_id'];

}
?>
		        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Customize Package</h2>
						<div class="page_link">
							<a href="">Home</a>
							<a href="">Customize Package</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
		<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<h3 class="mb-30 title_color">APPLY FOR JOB</h3>
								<h6 class="mb-30 title_color">Please fill the following details.</h6>
								<form name="form1"  method="POST" action="" id="form" enctype="multipart/form-data">
									<select name="category" id="category" class="form-control">
									<option value="">Select Category</option>
									<?php
									$sql="SELECT * FROM tbl_category WHERE `status`='1'";
									$result=mysqli_query($con,$sql);
									foreach ($result as $row)
									{
										?><option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
										<?php
										}
										?>
										</select>


										<select name="type" id="type" class="form-control">
									<option value="">Select Service Type</option>
									<?php
									$sql="SELECT * FROM tbl_type WHERE `status`='1'";
									$result=mysqli_query($con,$sql);
									foreach ($result as $row)
									{
										?><option value="<?php echo $row['type_id'];?>"><?php echo $row['type_name'];?></option>
										<?php
										}
										?>
										</select>
										<div class="form-group">
				<form name="add_name" id="add_name">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
								<td><input type="date" name="date[]" placeholder="Enter your Date" class="form-control name_list" /></td>

								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
						<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
					</div>
				</form>
			</div>
										
									<input type="hidden" name="vacancy_id" value="<?php echo $vacancy; ?>">
                                    <input type="submit" name="apply" value="Apply" class="genric-btn success circle">
									
									
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>							



				<!-- <form name="add_name" id="add_name">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>
								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
						<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
					</div>
				</form> -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- <script src="js/jquery-3.2.1.min.js"></script>
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
        <script src="js/theme.js"></script> -->
    </body>
</html>
<?php
include 'footer.php';
?>