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

}
?>

                    <!--================Home Banner Area =================-->
                    <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Profile</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="">Profile</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <?php 
        $id=$_SESSION['login_id'];
			// $sql = "SELECT tbl_ureg.*,tbl_login.* FROM tbl_ureg,tbl_login WHERE tbl_ureg.login_id=tbl_login.login_id";
            $sql="SELECT * FROM tbl_ureg JOIN tbl_login ON tbl_ureg.login_id = tbl_login.login_id WHERE tbl_ureg.login_id='$id'";
            
            $result = mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($result))
				{
                    $a=$row['image'];
                    ?>
        <section class="blog_area single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="single-post row">
                            
                            <div class="col-lg-3  col-md-3">
                                <div class="blog_info text-right">
                                    <img class="author_img rounded-circle" src="img/uploads/users/<?php echo $a?>" alt="">
                                <h4><?php echo $row['first_name']." ".$row['last_name'] ?></h4>
                                <p><?php echo $row['email'] ?></p>
                                <p><?php echo $row['mobile'] ?></p>
                                <!-- <input type="submit" name="update" value='Update Profile'> -->

                                </div>
                            </div>
                            </div>
                            
                </div>
            </div>
        </section>
        <?php
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
    </body>
</html>
<?php
include 'footer.php';
?>