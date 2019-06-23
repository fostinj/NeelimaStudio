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
						<h2>Products</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="services.php">Products</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
		<!-- <section class="home_gallery_area p_120">
        	<div class="container">
        		<div class="isotope_fillter">
        			<ul class="gallery_filter list">
						<li class="active" data-filter="*"><a href="#">All</a></li>
						<?php
					$sql="SELECT * FROM tbl_producttypes WHERE status='1'";
					$result = mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
						$product =$row['producttype_name'];
					?>
						<li data-filter=".<?php echo $product ?>"><a href="#"><?php echo $product ?></a></li>
						<?php
					}
					?>
					</ul>
					
        		</div>
			</div>
				</section> -->
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
                    // $sql="SELECT p.*,c.*,t.* FROM tbl_package p JOIN tbl_category c ON c.category_id=p.category_id JOIN tbl_type t ON t.type_id=p.type_id WHERE p.status='1'";
                    $sql="SELECT p.*,pt.* FROM tbl_products p JOIN tbl_producttypes pt ON pt.producttype_id=p.producttype_id WHERE p.status='1'";
					$result = mysqli_query($con,$sql);
					
					while($row=mysqli_fetch_array($result))
					{
						
                        $ptype = $row['producttype_id'];
						$pname =$row['product_name'];
						$image = 'img/uploads/products/'.$row['product_image'];
						$rate = $row['product_rate'];
						$pdescription = $row['product_description'];
					?>
					<form action="buyproducts.php" method="post">
					
			<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
        		
					<h3 class="mb-30 title_color"><?php echo $pname." " ?></h3>

						<div class="row">
							<div class="col-md-3">
								<img src="<?php echo $image?>" alt="" class="img-fluid">
								

							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
							<span id="price" style="color:black;"><h5>&#x20b9; <?php echo $rate ?></h5></span>
								
							<h5 style="color:black;"><?php echo $pdescription ?></h5>
								
                                <!-- <a href="userbooking.php?id=<?php echo $packageid ?>" class="white_btn pull-right" style="clear:both; float:left; margin-top:10px;border: 3px solid yellow; cursor: pointer;" name="book">Buy Now</a> -->
                                <input type="hidden" name="product_id" value="product_id"/>
                                <input type="button" name="submit" value="Buy Now" class="white_btn pull-right" style="clear:both; float:left; margin-top:10px;border: 3px solid yellow; cursor: pointer;"/>
								
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