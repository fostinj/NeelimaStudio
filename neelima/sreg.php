<?php
include 'connect.php';
//session_start();
if(isset($_POST['submit']))
{
	$firstName=$_POST["first_name"];
	$lastName=$_POST["last_name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
    $mobile=$_POST["mobile"];
    $designation=$_POST["designation"];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"img/uploads/staff/".$image);
	
	$sql2="select * from `tbl_login` where email='$email'";
	$result2=mysqli_query($con,$sql2)or die(mysql_error());
	$arr=mysqli_fetch_array($result2);
	if(mysqli_num_rows($result2) > 0)
	{
        echo"<script>alert('Email already exist..!!')</script>";
        echo "<script type='text/javascript'>window.location.href = 'sreg.php'</script>";
	}
	else {
	    $password=SHA1($password);
		$sql1="insert into `tbl_login`(`email`, `password`, `user_id`,`status`) values ('$email','$password','3','1')";
        $result1=mysqli_query($con,$sql1)or die(mysqli_error($con));
        
        // $query="select login_id from `tbl_login` where email='".$email."' and password='".$password."'";
        // $log_id=mysqli_query($con,$query)or die(mysqli_error($con));
        $log_id = $con->insert_id;


		$sql="insert into `tbl_sreg` (`first_name`, `last_name`, `mobile`,`image`,`designation_id`,`login_id` ) values ('$firstName','$lastName','$mobile','$image','$designation','$log_id')";
		$result3=mysqli_query($con,$sql);
        
        echo"<script>alert('Registration Successfull');</script>";
        echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";
    }		
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
        <header class="header_area">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container box_1620">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
                            <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                            <li class="nav-item"><a class="nav-link" href="about-us.php">About</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="login.php">SIGN IN</a></li>
                                    <li class="nav-item"><a class="nav-link" href="register.php">SIGN UP</a></li>
                                </ul>
                            </li> 
                            
                            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
                        </ul>
                    </div> 
                </div>
            </nav>
        </header>
        
        
       	<script>	
function fName(){
           var first_name=form1.first_name.value;
                if((first_name===null)||(first_name.length<2)){
                    
                    alert("Enter First Name");
                    form1.first_name.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z]{2,20}$/;
                if(form1.first_name.value.search(first_name)==-1)
                 {
                      alert("Enter First Name");
                      form1.first_name.focus();
                      
                      return false;
                    }
                if((first_name.length>20)){
                   
                    alert("Name Must Not Exceed 19 Characters");
                  form1.first_name.focus();
                    return false;
                }
        }
		

        function gEmail(){
           var email=form1.email.value;
                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>email.length)){
                    
                    form1.email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
        }
        function gPhone(){
           var mobile=form1.mobile.value;
                if(isNaN(mobile)){
                    
                    alert("Phone Number Only Contain Digits");
                    form1.mobile.focus();
                    return false;
                }
                if(mobile.length !== 10){
                   form1.mobile.focus();
                    alert("Phone Number must be 10 Digits");
                    
                    return false;
                }
        }
         function gPwd(){
           var password= form1.password.value;
               
                if(password.length < 4 ){
                    form1.password.style.border = "1px solid red";
                    form1.password.focus();
                    alert("Password Should contain atleast 4 characters");
                    return false;
                }
                
        } 
		
		//////////////////////////////////////////////////////////////////
		
		
         function  addUser(){
			
			
       var first_name= form1.first_name.value;
                if((first_name===null)||(first_name.length<3)){
                    form1.first_name.style.border = "1px solid red";
                    alert("Enter First Name");
                    form1.first_name.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z ]{4,25}$/;
                if(form1.first_name.value.search(first_name)==-1)
                 {
                      alert("Enter First Name");
                      form1.first_name.focus();
                      form1.first_name.style.border = "1px solid red";
                      return false;
                    }
                if((first_name.length>25)){
                    form1.first_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                   form1.first_name.focus();
                    return false;
                }
				
				
				
				
	   var   last_name= form1.last_name.value;
                if((last_name===null)||(last_name.length<3)){
                    form1.last_name.style.border = "1px solid red";
                    alert("Enter Full Name");
                    form1.last_name.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z ]{4,25}$/;
                if(form1.last_name.value.search(last_name)==-1)
                 {
                      alert("Enter correct  Name");
                      form1.last_name.focus();
                      form1.last_name.style.border = "1px solid red";
                      return false;
                    }
                if((last_name.length>25)){
                    form1.last_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                   form1.last_name.focus();
                    return false;
                }
                
				
				
				
       var mobile=form1.mobile.value;
                if(isNaN(mobile)){
                    form1.mobile.style.border = "1px solid red";
                    alert("Phone Number Only Contain Digits");
                   form1.mobile.focus();
                    return false;
                }
                if(mobile.length !== 10){
                    form1.mobile.style.border = "1px solid red";
                    alert("Phone Number must be 10 Digits");
                    form1.mobile.focus();
                    return false;
                }
                
                
                
                
          var email=form1.email.value;
                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>email.length)){
                    
                   form1.email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
				
			
		 var address= form1.address.value;
                if((address===null)||(address.length<3)){
                    form1.address.style.border = "1px solid red";
                    alert("Enter Full Address");
                    form1.address.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z ]{4,25}$/;
                if(form1.address.value.search(first_name)==-1)
                 {
                      alert("Enter correct  Address");
                      form1.address.focus();
                      form1.address.style.border = "1px solid red";
                      return false;
                    }
                if((address.length>100)){
                    form1.address.style.border = "1px solid red";
                    alert("  Address Must Not Exceed 99 Characters");
                   form1.address.focus();
                    return false;
                }
				
	
	
                
          var password= form1.password.value;
                
  
              
                if(password.length < 4 ){
                   form1.password.style.border = "1px solid red";
                   form1.password.focus();
                    alert("Password Should contain atleast 4 characters");
                    return false;
                }
                
            }
			
        </script>

    <SCRIPT type="text/javascript">
    function ValidateFileUpload() {
        var fuData = document.getElementById('fileChooser');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png"
                    || Extension == "jpeg" || Extension == "jpg") {

// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, and JPEG");

            }
        }
    }
</SCRIPT>


    <body>
                <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Registration</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="sreg.php">Staff Registration</a>
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
								<h3 class="mb-30 title_color">Registration</h3>
								<form name="form1"  method="POST" action="#" id="form" enctype="multipart/form-data" onSubmit="return addUser()">
									<div class="mt-10">
										<input type="text" name="first_name" id="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required onChange="return fName()" class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required onChange="return lName()" onChange="return fName()" class="single-input">
									</div>
									<div class="mt-10">
										<input type="mobile" name="mobile" placeholder="Mobile Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" required onChange="return gPhone()" class="single-input">
									</div>
                                    <div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="designation">
												<option value="">Designation</option>
												<option value="1">Photographer</option>
												<option value="2">Videographer</option>
												<option value="3">Editor(FCP)</option>
												<option value="4">Editor(Premiere)</option>
												<option value="5">Designer</option>
											</select>
										</div>
									</div>
									<div class="mt-10">
                                    <div class="mt-10">
                                        <input type="file" name="image"  id="fileChooser" onchange="return ValidateFileUpload()" placeholder="Select Image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Image'" required class="single-input">
                                        <img src="images/noimg.jpg" id="blah">
                                    </div>
										<input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required onChange="return gEmail()" class="single-input">
									</div>
                                    
									
									<div class="mt-10">
										<input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required onChange="return gPwd()" class="single-input">
									</div>
									
									
									
									
									<div class="button-group-area mt-10">
									 <button type="submit" name="submit" value="" class="genric-btn danger-border circle">Register</button>
									</div>
									<a href="login.php">Already have an Account? Login Here.</a>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
        
        
        
        <!--================Footer Area =================-->
        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<div class="f_title">
        						<h3>About Us</h3>
        					</div>
        					<p>Photography Studio in Kerala.</p>
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Neelima Studio</a>
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