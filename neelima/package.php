<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['userLogin']))
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
						<h2>Packages</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="services.php">Services</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
	
				<!--------------------------------SEARCH-------------------->
				<!-- <form action="" method="post">
								<input type="submit" id="submit"name="search_btn" class="btn_search" value="Search"  style="float:right;"></input>
								<input type="search" name="search_txt" class="search" id="search_box" placeholder="Search Package"  style="float:right;" ></input>
							</form> -->
<!-------------------------------------SEARCH-------------------->


			<!-- <div class="container box_1620"> -->
				<section>
			
					<?php 
					include 'connect.php';
					// $sql="SELECT p.*,c.*,t.*,r.* FROM tbl_package p JOIN tbl_category c ON c.category_id=p.category_id JOIN tbl_type t ON t.type_id=p.type_id JOIN tbl_rating r ON r.package_id=p.package_id WHERE p.status='1'";
					$sql="SELECT p.*,c.*,t.* FROM tbl_package p JOIN tbl_category c ON c.category_id=p.category_id JOIN tbl_type t ON t.type_id=p.type_id WHERE p.status='1'";
					$result = mysqli_query($con,$sql);
					
					while($row=mysqli_fetch_array($result))
					{
						
                        $packageid = $row['package_id'];
						$name =$row['package_name'];
						$imagePath = 'img/uploads/package/'.$row['image'];
						$category = $row['category_name'];
						$type = $row['type_name'];
						$rate = $row['package_rate'];
						$events = $row['event'];
						$services = $row['services'];
						$photography = $row['photography'];
						$videography = $row['videography'];
					?>
					<form action="userbooking.php" method="post">
					
			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
        		
					<h3 class="mb-30 title_color"><?php echo $name." " ?>Package</h3>

						<div class="row">
							<div class="col-md-3">
								<img src="<?php echo $imagePath?>" alt="" class="img-fluid">
								<br>
								<br>
									<input type="button" name="" onclick="window.location.href = 'packagedetails.php?id=<?php echo $packageid ?>';" value="More Details" class="genric-btn info-border circle pull-left">
									<input type="button" name="" onclick="window.location.href = 'rating.php?id=<?php echo $packageid ?>';" value="Rate Now" class="genric-btn primary-border circle pull-right">

							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
							<span id="price" style="color:black;"><h5>&#x20b9; <?php echo $rate ?></h5></span>
								
							<h5 style="color:black;"><?php echo "Functions: ".$events ?></h5>
							<h5 style="color:black;"><?php echo "Services include: ".$services ?></h5>
							<h5 style="color:black;"><?php echo $photography." Photographer "." + ".$videography." Videographer" ?></h5>
								
								<a href="userbooking.php?id=<?php echo $packageid ?>" class="white_btn pull-right" style="clear:both; float:left; margin-top:10px;border: 3px solid yellow; cursor: pointer;" name="book">Book Now</a>
								
							</div>
						</div>
						</div>
						</div>
					</div>
                    </form>
				<?php
					}
					?>
					
        		<div>
        	</div>
        </section>
<?php
include 'footer.php';
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
    </body>
</html>