<?php
session_start();
include 'connect.php';
if ($_SESSION['adminLogin'] != 'active')
{
    header('location:../index.php');
}

include 'adminsidebar.php';
include 'design.php';
?>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-right">Services Booking Details</h2>
                    </div>

<section id="content">
  <div class="container">
    
    <div class="tile">
      <div class="t-header">
      <!-- <a href="addvacancy.php" class="btn btn-success">Add New Vacancy</a> -->

      </div>
      <table id="data-table-command" class="table table-bordered table-vmiddle">
        <thead>
          <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="customer">Customer</th>
            <th data-column-id="mobile">Contact</th>
            <th data-column-id="category">Category</th>
            <th data-column-id="subcategory">Subategory</th>
            <th data-column-id="services">Services</th>
            <th data-column-id="date">Booked Date</th>
            <th data-column-id="location">Location</th>
            <th data-column-id="booked">Booked On</th>
            <th data-column-id="approve">Approve</th>
          </tr>
        </thead>
        <tbody>
        <?php
                    // Include config file
                    require_once "connect.php";
                    
                    // Attempt select query execution
                    // $sql = "SELECT tbl_booking.*,tbl_package.*,tbl_category.*,tbl_ureg.*,tbl_login.* FROM tbl_booking,tbl_package,tbl_category,tbl_ureg,tbl_login WHERE tbl_booking.package_id=tbl_package.package_id AND tbl_booking.category_id=tbl_category.category_id AND tbl_booking.login_id=tbl_login.login_id AND tbl_ureg.login_id=tbl_login.login_id AND tbl_booking.status='1' AND tbl_booking.approve='0'";
                    // $sql="SELECT b.*,p.*,l.*,u.* FROM tbl_booking b JOIN tbl_package p ON p.package_id=b.package_id JOIN tbl_login l ON l.login_id=b.login_id JOIN tbl_ureg u ON u.login_id=l.login_id WHERE b.status='1' AND b.approve='0'";
                    $sql="SELECT b.*,c.*,sub.*,ser.*,l.*,u.* FROM tbl_servicesbooking b JOIN tbl_category c ON c.category_id=b.category_id JOIN tbl_subcategory sub ON sub.subcategory_id=b.subcategory_id JOIN tbl_services ser ON ser.services_id=b.services_id JOIN tbl_login l ON l.login_id=b.login_id JOIN tbl_ureg u ON u.login_id=l.login_id WHERE b.status='1' AND b.approve='1' ORDER BY b.login_id ASC";
                    $result=mysqli_query($con,$sql);
                    $rowcount = 1;
                    while($row=mysqli_fetch_array($result))
                    {
                        
                            ?>
                    
          <tr>    
            <td><?php echo $rowcount ?></td>
            <td><?php echo $row['first_name']." ".$row['last_name']?></td>
            <td><?php echo $row['mobile']?></td>
            <td><?php echo $row['category_name']?></td>
            <td><?php echo $row['subcategory_name']?></td>
            <td><?php echo $row['services_name']?></td>
            <td><?php echo $row['date']?></td>
            <td><?php echo $row['location']?></td>
            <td><?php echo $row['added_on']?></td>
            <td><a href="unapproveservicebooking.php?id=<?php echo $row['servicesbooking_id'] ?>" class="btn btn-success">Unpprove</a></td>
          </tr>
          <?php
          $rowcount++;
          }
          ?>
          
        </tbody>
      </table>
    </div>
  </div>
</section>

                        
                </div>
            </div>        
        </div>
    </div>
    <!-- Javascript Libraries --> 
    <script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.js"></script> 
<script src="js/jquery.flot.resize.js"></script> 
<script src="js/jquery.flot.orderBars.js"></script> 
<script src="js/curvedLines.js"></script> 
<script src="js/jquery.flot.orderBars.js"></script> 
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="js/jquery.sparkline.min.js"></script> 
<script src="js/jquery.easypiechart.min.js"></script> 
<script src="js/bootstrap-growl.min.js"></script> 
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="js/moment.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/flot-charts/curved-line-chart.js"></script> 
<script src="js/flot-charts/bar-chart.js"></script> 
<script src="js/charts.js"></script> 
<script src="js/functions.js"></script> 
<script src="js/demo.js"></script>


</body>
</html>