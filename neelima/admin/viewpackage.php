<?php
session_start();
include 'connect.php';
if ($_SESSION['adminLogin'] != 'active')
{
    header('location:index.php');
}
else
{
  include 'adminsidebar.php';
  include 'adminfooter.php';
}
?>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-right">View Package</h2>
                    </div>

<section id="content">
  <div class="container">
    
    <div class="tile">
      <div class="t-header">

      </div>
      <table id="data-table-command" class="table table-bordered table-vmiddle">
        <thead>
          <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="name">Name</th>
            <th data-column-id="rate">Rate</th>
            <th data-column-id="functions">Functions</th>
            <th data-column-id="album">Album Out</th>
            <th data-column-id="video">Video Out</th>
            <th data-column-id="details">Details</th>
            <th data-column-id="payment">Advance Rate</th>
            <th data-column-id="delete">Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
// Include config file
        require_once "connect.php";
                    
// Attempt select query execution
        // $sql = "SELECT tbl_ureg.*,tbl_login.*,tbl_jobapplicants.*,tbl_vacancy.*,tbl_designation.* FROM tbl_ureg,tbl_login,tbl_jobapplicants,tbl_vacancy,tbl_designation WHERE tbl_ureg.login_id=tbl_login.login_id AND tbl_jobapplicants.vacancy_id=tbl_vacancy.vacancy_id AND tbl_jobapplicants.login_id=tbl_login.login_id AND tbl_vacancy.designation_id=tbl_designation.designation_id AND tbl_jobapplicants.status='1' AND tbl_jobapplicants.approve='1' ORDER BY tbl_jobapplicants.created_at DESC";
        $sql="SELECT * FROM tbl_package WHERE `status`='1'";
        $result=mysqli_query($con,$sql);
        $rowcount = 1;
        while($row=mysqli_fetch_array($result))
        {
          $package_id=$row['package_id'];              
        ?>
        <form method="post" action="" >
          <tr>    
            <td><?php echo $rowcount ?></td>
            <td><?php echo $row['package_name']?></td>
            <td><?php echo $row['package_rate']?></td>
            <td><?php echo $row['event']?></td>
            <td><?php echo $row['photography']?></td>
            <td><?php echo $row['videography']?></td>
            <td><?php echo $row['package_details']?></td>
            <td><?php echo $row['payment_details']?></td>
			<input type="hidden" name="vacancy_id" value="<?php echo $vacancy_id ?>">
            <td><a href="deletepackage.php?id=<?php echo $row['package_id'] ?>" class="btn btn-danger">Delete</a></td>

          </tr>
          </form>
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