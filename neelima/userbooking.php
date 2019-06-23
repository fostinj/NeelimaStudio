<?php
session_start();
include 'connect.php';
if ($_SESSION['userLogin'] == 'active')
{
    $loginId=$_SESSION['login_id'];
    include 'userheader.php';
}
else
{
    header('location:login.php');
}
?>

                <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Booking</h2>
						<div class="page_link">
							<a href="">Home</a>
							<a href="">Booking</a>
						</div>
					</div>
				</div>
            </div>
        </section>

		<?php 
	   $sql="SELECT * FROM tbl_package WHERE package_id=".$_GET['id'];
	   $obj=mysqli_query($con,$sql);
    	while($row = mysqli_fetch_array($obj))
    	{
			$packageid=$row['package_id'];
			$packagename=$row['package_name'];
			$rate=$row['package_rate'];
	   ?>

         <div class="whole-wrap">
				<div class="container">
					
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<!-- <h3 class="mb-30 title_color">BOOKING</h3> -->
								<h6 class="mb-30 title_color">Please fill the following details. [Enter Event Name Date & Location]</h6>
								<h3>You have selected <?php echo "<b>&#x20b9; ".$rate." </b>".$packagename." Package" ?></h3>
								<form name="add_name" id="add_name">
					<div class="table-responsive">
						<table class="table table-bordered" id="dynamic_field">
						<td><input type="hidden" name="package_id" value="<?php echo $packageid ?>" class="form-control name_list" /></td>
							<tr>
								<td><input type="text" name="event[]" placeholder="Enter Event Name" class="form-control name_list" required/></td>
								<tr>
							<td><input type="date" name="date[]" min="<?php echo date('Y-m-d');?>" placeholder="Enter Event Date" class="form-control name_list" required/></td>
								
							</tr>
							<tr>
								<td><input type="text" name="location[]"  placeholder="Enter event Location" class="form-control name_list" required/></td>
								


								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>


						</table>
						<input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
					</div>
				</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
			<?php
				}
			?>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="event[]" placeholder="Enter Event Name" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>').append('<tr id="row'+i+'"><td><input type="date" name="date[]" min="<?php echo date('Y-m-d');?>" placeholder="Enter Event Date" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>').append('<tr id="row'+i+'"><td><input type="text" name="location[]"  placeholder="Enter event Location" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});

	

	
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"packagebooking.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
});
</script>




           
        
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

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
    </body>
</html>
<?php
include 'footer.php';
?>