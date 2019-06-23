<?php
session_start();

include 'connect.php';
if ($_SESSION['userLogin'] != 'active')
{
    header('location:index.php');
}
else
{
    include 'userheader.php';
    $name = $_SESSION['name'];
    $mobile = $_SESSION['mobile'];
    $image = $_SESSION['image'];
    
}



?>


        <section class="home_banner_area blog_banner">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="blog_b_text text-center">
						<h2><?php

    echo "<h1 style='text-align:center;margin-top:20px;'>Welcome " . $name . "</h1>";?></h2>
                        <a class="white_btn" href="userprofile.php">View Profile</a>
						<a class="white_btn" href="package.php">Book Now</a>
					</div>
				</div>
            </div>
        </section>
        
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
<?php

include 'footer.php';
?>