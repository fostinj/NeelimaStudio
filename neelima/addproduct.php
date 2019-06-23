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
 
<script type="text/javascript">
function validateImage() {
    var formData = new FormData();
 
    var file = document.getElementById("img").files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file');
        document.getElementById("img").value = '';
        return false;
    }
    if (file.size > 1024000) {
        alert('Max Upload size is 1MB only');
        document.getElementById("img").value = '';
        return false;
    }
    return true;
}
</script>
		        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Payment</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="addproduct.php">Add Product</a>
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
                                <h3 class="mb-30 title_color">Product Details</h3>
                                <form name="form1"  method="POST" action="addproduct_action.php" id="form" enctype="multipart/form-data" onSubmit="return addUser()">
                                <div class="input-group-icon mt-10">
										<div class="icon"><i class="" aria-hidden="true"></i></div>
										<div class="form-select" id="default-select">
											<select name="producttype_id">
												<option value="">Select Product Category</option>
                                                <?php
                                                $sql="SELECT * FROM tbl_producttypes WHERE `status`='1'";
                                                $result=mysqli_query($con,$sql);
                                                while($row=mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                <option value="<?php echo $row['producttype_id'] ?>" name="<?php echo $row['producttype_id'] ?>"><?php echo $row['producttype_name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            
										</div>
									</div>
									<div class="mt-10">
										<input type="text" name="product_name" id="product" placeholder="Product Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Name'" required onChange="return fName()" class="single-input">
                                    </div>
                                    <div class="mt-10">
										<input type="text" name="product_description" id="description" placeholder="Product Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Description'" required onChange="return fName()" class="single-input">
									</div>
									<div class="mt-10">
										<input type="number" name="product_rate" placeholder="Product Rate" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Rate'" required onChange="return lName()" onChange="return fName()" class="single-input">
                                    </div>
                                    <!-- <div class="mt-10">
										<input type="text" name="product_code" placeholder="Product Code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Code'" required onChange="return lName()" onChange="return fName()" class="single-input">
                                    </div> -->
                                    <div class="mt-10">
										<input type="file" name="product_image" placeholder="Product Image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Image'" required id="img" onchange="validateImage()" accept="image/*" class="single-input">
                                    </div>
                                    
										<div class="button-group-area mt-10">
									 <button type="submit" name="submit" value="" class="genric-btn success-border circle">Add Product</button>
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