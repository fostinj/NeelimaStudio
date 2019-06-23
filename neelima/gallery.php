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

}
?>

        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Gallery</h2>
						<div class="page_link">
							<a href="#">Home</a>
							<a href="#">Gallery</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
		<!--================Home Gallery Area =================-->
		
	

						
        <section class="home_gallery_area p_120">
        	<div class="container">
        		<div class="isotope_fillter">
        			
        		</div>
			</div>
			
        	<div class="container box_1620">
        		<div class="gallery_f_inner row imageGallery1">
					<?php 
					include 'connect.php';
					// $sql = "SELECT tbl_gallery.*,tbl_category.*,tbl_religion.* FROM tbl_gallery,tbl_category,tbl_religion WHERE tbl_gallery.category_id=tbl_category.category_id AND tbl_gallery.religion_id=tbl_religion.religion_id ORDER BY created_at DESC";
					$sql="SELECT * FROM tbl_gallery WHERE `status`='1' ORDER BY `created_at` DESC";
					$result = mysqli_query($con,$sql);
					$num=mysqli_num_rows($result);
					if($num > 0){
						while($row = mysqli_fetch_assoc($result)){
							$image = 'img/uploads/gallery/'.$row["image_name"];
							
					?>
	        			<div class="col-lg-3 col-md-4 col-sm-6 <?php  echo $category ?>">

        				<div class="h_gallery_item">
        					<img src="<?php echo $image; ?>" alt="">
        					<div class="hover">
        						<!-- <a href="#"><h4> </h4></a> -->
        						<a class="light" href="<?php echo $image ?>"><i class="fa fa-expand"></i></a>
        					</div>
        				</div>
        			</div>
        			
				<?php
					}
				}
					?>
        		<div>
        	</div>
        </section>
        <!--================End Home Gallery Area =================-->
        
       
        
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