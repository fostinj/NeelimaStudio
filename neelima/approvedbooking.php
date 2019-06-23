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
						<h2>Approved Booking</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="approvedbooking.php">Approved Booking</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <?php

    
    $sql = "select b.*,p.* from tbl_booking b JOIN tbl_package p ON p.package_id=b.package_id where login_id='$loginId'";
    $query = mysqli_query($con, $sql);
    if($row=mysqli_num_rows($query) > 0)
	{
        $bookid=$row['booking_id'];
        ?>        
	<section>
        <!-- <h3 style="margin: 50px;text-align: center;">Current Bookings:</h3>
        <div class="row" style="justify-content: center;"> -->
			<form action="" method="POST">
				
        <?php
        // while($result=mysqli_fetch_array($query)) {
        //     $package = $result['package_id'];
            $sql2 = "select p.*,b.* from tbl_package p JOIN tbl_booking b ON b.package_id=p.package_id WHERE b.approve='1' and b.status='1'ORDER BY b.date ASC";
			$query2 = mysqli_query($con, $sql2);
			$rowcount=1;
			while($packageInfo = mysqli_fetch_array($query2))
			{
                $package=$packageInfo['package_id'];
                $pname=$packageInfo['package_name'];
            ?>
           <div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
        		
					<h4 class="mb-30 title_color" style="color:red;"><?php echo $rowcount.". ".$packageInfo['package_name']." " ?>Package</h4>

						<div class="row">
							

							<div class="col-md-9 mt-sm-20 left-align-p">
							
							<h5 style="color:black;"><?php echo "Date: ".$packageInfo['date'] ?></h5>
							<h5 style="color:black;"><?php echo "Event: ".$packageInfo['event'] ?></h5>
							<h5 style="color:black;"><?php echo "Location: ".$packageInfo['location'] ?></h5>
							
								<a href="payment.php?id=<?php echo $package ?>" class="genric-btn danger circle arrow" name="book">Make Advance Payment</a>
								
							</div>
						</div>
						</div>
						</div>
					</div>
                    </form>
				<?php
				$rowcount++;
					}
					?>
					
        </section>
		<?php
					}
					?>
<?php
include 'footer.php';
?>