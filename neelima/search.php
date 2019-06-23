<?php
include 'connect.php';
?>
<div class="container">
          <div class="row">
            <div class="col-sm-12">
							<form action="" method="post">
								<input type="submit" id="submit"name="search_btn" class="btn_search" value="Search"  style="float:right;"></input>
								<input type="search" name="search_txt" class="search" id="search_box" placeholder="Search..."  style="float:right;" ></input>
							</form>

              <h2>Photography&Videography</h2>

            <p>THE ENTIRE EVENT can be covered digitally to transmit to distant lands where anxious relatives and friends can join the celebrations live through on line.</p><p>THE ENTIRE TEAM OF   professional cinematographers and still photographers who can blot each moments to a  visual treat  for ever as a fondly caring document that may bring back every moment in future as lively as on that day of importance.The event venue can even extend to exotic locations where no one had ever picturised an event like this in the past.</p>
            </div><!-- col -->
         </div><!-- row -->
        </div><!-- container -->
        <div class="container">
          <div class="row">

<?php
$search_q="";
if(isset($_POST['search_btn'])){
	$term=$_POST['search_txt'];
	$search_q="AND `package_name` LIKE '%$term%'";
}
//echo "SELECT * FROM `wp_stage` WHERE stage_id NOT IN (SELECT cart_item_id from wp_addtocart Where cart_item_type=1 and cart_login_id=$user_id and cart_status=1) AND`stage_status`=1 $search_q";
	// $user_id=$_SESSION['user'];
    $query=mysqli_query($con,"SELECT * FROM `tbl_package` WHERE`status`=1 $search_q");
    while ($row=mysqli_fetch_array($query)) {
      ?>
      <div class="col-sm-4">

        <div class="about-me wow fadeInLeft animated animated" style="visibility: visible;">
       <form action="photodes.php" method="post">
				 <input type="hidden" name="item_id" value="<?php echo $row['package_id'] ?>">
				 <input type="hidden" name="item_type" value="1">
          <div class="about-me-thumbnail">

            <img style="height:215px !important"src="img/uploads/gallery/.<?php echo $row['image'] ?>" alt="">

            <div class="social-media">


              <a ><?php echo $row['package_name'] ?></a>
								<center><button type="submit" class="btn_cart" name="viewdetails" id="button"><i class="fa fa-eye"></i>View Details</button></center>
            </div>
          </div>
				</form>
        </div>
      </div>

      <?php
    }
 ?>
            <!-- col -->
          </div><!-- row -->
        </div>
        <!-- FOOTER -->