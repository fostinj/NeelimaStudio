<?php
include 'connect.php';
//session_start();

?>
<?php
include 'header.php';
?>        
        

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
							<a href="register.php">Register</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
       <section class="button-area">
				<div class="container border-top-generic">
					<h3 class="text-heading title_color">Register As</h3>
					
					
					<div class="button-group-area mt-40">
						<a href="ureg.php" class="genric-btn primary e-large">Customer</a>
						<a href="sreg.php" class="genric-btn success e-large">Neelima Staff</a>
						<a href="lreg.php" class="genric-btn danger e-large">Color Lab</a>
					</div>
					
				</div>
			</section>
        
        
        
 <?php
 include 'footer.php';
 ?>