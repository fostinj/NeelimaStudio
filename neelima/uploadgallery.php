<?php
session_start();
include 'connect.php';
if ($_SESSION['adminLogin'] != 'active')
{
    header('location:index.php');
}

?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Neelima Studio</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="vendors/linericon/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="vendors/animate-css/animate.css">
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->

        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Upload</h2>
						<div class="page_link">
							<a href="adminhome.php">Home</a>
							<a href="adminimageupload.php">Upload</a>
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
								<h3 class="mb-30 title_color">Upload Album</h3>
								<form  method="POST" action="" id="" enctype="multipart/form-data">
									<div class="mt-10">
										<input type="text" name="album_name" id="album_name" placeholder="Album Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Album Name'" required class="single-input">
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="category">
												<option value="0">Category</option>
												<option value="Pre Wedding">Pre Wedding</option>
												<option value="Wedding">Wedding</option>
												<option value="Post Wedding">Post Wedding</option>
												<option value="Baptism">Baptism</option>
												<option value="Kids">Kids</option>
												<option value="Holy communion">Holy Communion</option>
												<option value="Birthday">Birthday</option>
												<option value="Modeling">Modeling</option>
												<option value="Other">Other</option>
											</select>
										</div>
									</div>
									<div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="religion">
												<option value="">Religion</option>
												<option value="Christian">Christian</option>
												<option value="Hindhu">Hindhu</option>
												<option value="Muslim">Muslim</option>
											</select>
										</div>
									</div>
									
									<div class="mt-10">
										<input type="text" name="image_name" placeholder="Image Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Image Name'" required class="single-input">
									</div>
									<div class="mt-10">
									<input type="file" name="imageUpload" placeholder="Select Image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Image'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="album_description" placeholder="Album Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Album Description'" required class="single-input">
									</div>
							
									<div class="button-group-area mt-10">
									 <button type="submit" name="submit" value="" class="genric-btn danger-border circle">Add</button>
									</div>
									
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			
<?php

include("connect.php");

if(isset($_POST['submit']))
{
    
    
    $category = $_POST['category'];
    $religion = $_POST['religion'];
    $image_name = $_POST['image_name'];
    $image = $_FILES['imageUpload']['name'];
    move_uploaded_file($_FILES['imageUpload']['tmp_name'],"img/uploads/".$image);
    $album_description = $_POST['album_description'];
    $query = "INSERT INTO `tbl_gallery`(`gallery_id`, `image_name`, `image_upload`, `category_id`, `religion_id`, `status`, `created_at`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7])";
    $sql = mysqli_query($con,$query);  
	
    if($sql == true)
	{
		echo "<script>alert('Uploaded Successfully');window.location='adminimageupload.php';</script>";
	}else
	{
		echo "<script>alert('Uploading Failed');window.location='adminimageupload.php';</script>";
	}
  
  
    header("location:../adminimageupload.php?suc='Product added successfully'");
       
}


?>

  
        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<div class="f_title">
        						<h3>About Me</h3>
        					</div>
        					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore </p>
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        				</aside>
        			</div>
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget news_widget">
        					<div class="f_title">
        						<h3>Newsletter</h3>
        					</div>
        					<p>Stay updated with our latest trends</p>
        					<div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                	<div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                    </div>				
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
        				</aside>
        			</div>
        			<div class="col-lg-2">
        				<aside class="f_widget social_widget">
        					<div class="f_title">
        						<h3>Follow Me</h3>
        					</div>
        					<p>Let us be social</p>
        					<ul class="list">
        						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
        						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
        						<li><a href="#"><i class="fa fa-behance"></i></a></li>
        					</ul>
        				</aside>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
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