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
                        <h2 class="pull-left">Vacancy Details</h2>
                    </div>

<section id="content">
  <div class="container">
    
    <div class="tile">
      <div class="t-header">
      <a href="addvacancy.php" class="btn btn-success">Add New Vacancy</a>

      </div>
      <table id="data-table-command" class="table table-bordered table-vmiddle">
        <thead>
          <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="job">Job Type</th>
            <th data-column-id="vacancies">Vacancies</th>
            <th data-column-id="sender">Experience</th>
            <th data-column-id="description">Description</th>
            <th data-column-id="edit">Edit</th>
            <th data-column-id="delete">Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
                    // Include config file
                    require_once "connect.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT tbl_vacancy.*,tbl_designation.* FROM tbl_vacancy,tbl_designation WHERE tbl_vacancy.designation_id=tbl_designation.designation_id AND tbl_vacancy.status='1'";
                    $result=mysqli_query($con,$sql);
                    $rowcount = 1;
                    while($row=mysqli_fetch_array($result))
                    {
                        
                            ?>
          <tr>    
            <td><?php echo $rowcount ?></td>
            <td><?php echo $row['designation_name']?></td>
            <td><?php echo $row['vacancy_number']?></td>
            <td><?php echo $row['experience']?></td>
            <td><?php echo $row['description']?></td>
            <td><a href="editvacancy.php?id=<?php echo $row['vacancy_id'] ?>" class="btn btn-default">Edit</a></td>
            <td><a href="deletevacancy.php?id=<?php echo $row['vacancy_id'] ?>" class="btn btn-danger">Delete</a></td>
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