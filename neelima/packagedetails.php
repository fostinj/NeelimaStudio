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
 <!--================Home Banner Area =================-->
 <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Package Details</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="">Package Details</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
<form action="" method="post">
		<?php 
					$sql = "SELECT p.*,c.*,t.* FROM tbl_package p JOIN tbl_category c ON c.category_id=p.category_id JOIN tbl_type t ON t.type_id=p.type_id WHERE p.package_id=".$_GET['id'];
					$result = mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
                        $packageid = $row['package_id'];
						$name =$row['package_name'];
						$imagePath = 'img/uploads/package/'.$row['image'];
						$rate = $row['package_rate'];
						$category=$row['category_name'];
                        $type = $row['type_name'];
                        $photographers =$row['photography'];
						$videographers =$row['videography'];
						$album=$row['album_output'];
						$video=$row['video_output'];
						$pdetails=$row['package_details'];
						$payment=$row['payment_details'];
						$services=$row['services'];
					?>
					
					
		<!--================Blog Categorie Area =================-->
        <section class="find_view_area p_120">
        	<div class="container">
        		<div class="find_inner">
        			<img class="img-fluid" src="<?php echo $imagePath ?>" alt="">
        			<div class="find_text">
        				<div class="find_text_inner"><div class="price-container" style="width: 100px;display: inline-block; margin: 100px auto; float: right">
                    <span id="price" style="font-size: 1.8vw;font-weight: bold">&#x20b9; <h2><b><?php echo $rate ?></b></h2></span>
                        </div>
        					<h4><?php echo $type." ".$name." Package" ?></h4>
                            <h5 style="color:black;"><?php echo $category." Package" ?></h5>
        					<!-- <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.</p> -->
                            <h4 style="color:black;"><?php echo "<b>INCLUDE: </b>".$photographers."  Photographers & ".$videographers." Videographers" ?></h4>
							<h4 style="color:black;"><?php echo "<b>SERVICES: </b>".$services ?></h4>
							<h4 style="color:black;"><?php echo "<b>PHOTO ALBUM: </b> ".$album ?></h4>
							<h4 style="color:black;"><?php echo "<b>VIDEO OUTPUT: </b> ".$video ?></h4>
							<h4 style="color:black;"><?php echo $pdetails ?></h4>
							<h5 style="color:black;"><?php echo "<b>ADVANCE PAYMENT: </b> "."&#x20b9; ".$payment ?></h5>
							
							<a href="userbooking.php?id=<?php echo $packageid ?>" class="white_btn pull-right" style="clear:both; float:left; margin-top:10px;border: 3px solid yellow; cursor: pointer;" name="book">Book Now</a>

						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</section>
		
		<?php
					}
					?>
                    </form>
                    <?php
                    include 'footer.php';
                    ?>