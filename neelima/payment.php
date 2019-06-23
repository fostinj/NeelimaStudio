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
						<h2>Payment</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="payment.php">Payment</a>
						</div>
					</div>
				</div>
            </div>
        </section>
		<!--================End Home Banner Area =================-->
		
		<?php
                                $query="SELECT * FROM tbl_package WHERE package_id=".$_GET['id'];
                                $res=mysqli_query($con,$query);
                                while($row=mysqli_fetch_array($res))
                                {
									$package_id=$row['package_id'];
									$payment=$row['payment_details'];
                                    ?>
        <div class="whole-wrap">
				<div class="container">
					
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
                                <h3 class="mb-30 title_color">Enter Payment Details For <b><?php echo $row['package_name']." Package" ?></b></h3>
                                <form name="form1"  method="POST" action="payment_action.php" id="form" enctype="multipart/form-data" onSubmit="return addUser()">
                                <div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="bank">
												<option value="">Select Bank</option>
                                                <?php
                                                $sql="SELECT * FROM tbl_bank";
                                                $result=mysqli_query($con,$sql);
                                                while($row=mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                <option value="<?php echo $row['bank_id'] ?>"><?php echo $row['bank_name'] ?></option>
                                                <?php
                                                }
                                                ?>
											</select>
										</div>
									</div>
									<div class="mt-10">
										<input type="text" name="card_no" id="card_no" placeholder="Card Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Card Number'" required onChange="return fName()" class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="card_name" placeholder="Card Holder Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Card Holder Name'" required onChange="return lName()" onChange="return fName()" class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="month">
												<option value="">Expiry Month</option>
												<option value="jan">Jan</option>
												<option value="feb">Feb</option>
												<option value="mar">Mar</option>
												<option value="apr">Apr</option>
												<option value="may">May</option>
												<option value="jun">Jun</option>
												<option value="jul">Jul</option>
												<option value="aug">Aug</option>
												<option value="sep">Sep</option>
												<option value="oct">Oct</option>
												<option value="nov">Nov</option>
												<option value="dec">Dec</option>
											</select>
										</div>
                                    </div>
                                    <div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="year">
												<option value="">Expiry Year</option>
												<option value="2019">2019</option>
												<option value="2020">2020</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
												<option value="2026">2026</option>
												<option value="2027">2027</option>
												<option value="2028">2028</option>
											</select>
										</div>
									</div>
									<div class="mt-10">
										<input type="number" name="cvv" placeholder="cvv" onfocus="this.placeholder = ''" onblur="this.placeholder = 'cvv'" required onChange="return gPhone()" class="single-input">
                                    </div>
                                
                                    <div class="mt-10">
										<input type="text" name="<?php echo $payment ?>" value="<?php echo "&#x20b9; ".$payment ?>" placeholder="<?php echo "&#x20b9; ".$payment ?>"   class="single-input" readonly>
									</div>
									<input type="hidden" name="package_id" value="<?php echo $row['package_id'] ?>" />
									<input type="hidden" name="amount" value="<?php echo $payment ?>" />
                                    <?php
                                }
                                ?>
									<div class="button-group-area mt-10">
									 <button type="submit" name="submit" value="" class="genric-btn danger-border circle">Make Payment</button>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>

<?php
include 'footer.php';
?>