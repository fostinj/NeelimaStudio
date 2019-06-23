<?php
include 'connect.php';
$search_q="";
if(isset($_POST['search_btn'])){
	$term=$_POST['search_txt'];
	$search_q="AND `package_name` LIKE '%$term%'";
}
$query=mysqli_query($con,"SELECT * FROM `tbl_package` WHERE`status`=1 $search_q");
    while ($row=mysqli_fetch_array($query)) {
      ?>
      <section>
      <div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
        		
					<h3 class="mb-30 title_color"><?php echo $row['package_name'] ?>Package</h3>

						<div class="row">
							<div class="col-md-3">
								<img src="img/uploads/package/.<?php echo $row['image'] ?>" alt="" class="img-fluid">
								


							</div>
							<div class="col-md-9 mt-sm-20 left-align-p">
							<span id="price" style="color:black;"><h5>&#x20b9; <?php echo $row['package_rate'] ?></h5></span>
							
								
								
							
								
								
								
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