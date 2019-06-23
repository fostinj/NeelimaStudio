<?php
session_start();
include 'connect.php';
if ($_SESSION['adminLogin'] != 'active')
{
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="x-ua-compatible" content="ie=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta charset="UTF-8">
<meta name="description" content="Practo - The Ultimate Multipurpose Admin Template">
<meta name="keywords" content="Practo, Admin, Template, Bootstrap">
<title>Neelima Studio</title>
<link rel="shortcut icon" href="favicon.ico">
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="css/fullcalendar.min.css" rel="stylesheet">
<link href="css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>NeelimaStudio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
                        <header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
                        <ul class="header-inner">
    
                         <!-- Logo -->
                         <li class="logo"> <a href="index.html"><img src="img/logo.png" alt="Practo"></a>
                          <div id="menu-trigger"><i class="jtv jtv-menu"></i></div>
                        </li>

            <!-- Events -->
    <li class="dropdown hidden-xs"> <a href="#" data-toggle="dropdown" class="hi-events"> <i class="jtv jtv-calendar"></i> </a>
      <div class="dropdown-menu hi-dropdown">
        <div class="dropdown-header bg-blue m-b-15"> UPCOMING EVENTS
          <ul class="actions a-alt">
            <li><a class="" href="#"><i class="jtv jtv-plus"></i></a></li>
          </ul>
        </div>
        <div class="list-group lg-alt"> <a class="list-group-item media" href="#">
          <div class="pull-left">
            <div class="event-time bg-cyan">
              <h2>16/07</h2>
              <small>11:30 AM</small> </div>
          </div>
          
        <a class="view-more" href="#">View more</a> </div>
    </li>
    
    <!-- Search -->
    <li class="top-search">
      <input class="ts-input" placeholder="Search..." type="text">
      <i class="ts-reset jtv jtv-close"></i> </li>
    
    <!-- Settings -->
    <li class="pull-right dropdown hidden-xs"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
      <ul class="dropdown-menu">
        
        
        <li><a href="#">Account Settings</a></li>
        <li><a href="#">Other Settings</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </li>
    
    <!-- Quick Apps -->
    <li class="hidden-xs dropdown pull-right"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-apps"></i> </a>
      <div class="dropdown-menu pull-right" id="launch-apps">
        <div class="dropdown-header bg-teal">Neelima APPS</div>
        <div class="la-body">
          <div class="lab-item"> <a href="#" class="bg-red"> <i class="jtv jtv-calendar"></i> </a> <small>Calendar</small> </div>
          <div class="lab-item"> <a href="#" class="bg-green"> <i class="jtv jtv-file-text"></i> </a> <small>Files</small> </div>
          <div class="lab-item"> <a href="#" class="bg-blue"> <i class="jtv jtv-email"></i> </a> <small>Mail</small> </div>
          <div class="lab-item"> <a href="#" class="bg-orange"> <i class="jtv jtv-trending-up"></i> </a> <small>Analytics</small> </div>
          <div class="lab-item"> <a href="#" class="bg-cyan"> <i class="jtv jtv-view-headline"></i> </a> <small>News</small> </div>
          <div class="lab-item"> <a href="#" class="bg-teal"> <i class="jtv jtv-image"></i> </a> <small>Gallery</small> </div>
        </div>
      </div>
    </li>
    <!-- Time -->
    <li class="pull-right hidden-xs">
      <div id="time"> <span id="t-hours"></span> <span id="t-min"></span> <span id="t-sec"></span> </div>
    </li>
  </ul>
</header>
<aside id="sidebar"> 
  
  <!--| MAIN MENU |-->
  <ul class="side-menu">
    <li class="sm-sub sms-profile"> <a class="clearfix" href="#"> <img src="img/profile-pic.jpg" alt=""> <span class="f-11"> <span class="d-block">Admin Author</span> <small class="text-lowercase">email@example.com</small> </span> </a>
      <ul>
        <li><a href="#">View Profile</a></li>
        <li><a href="#">Privacy Settings</a></li>
        <li><a href="#">Settings</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </li>
    <li class="active"> <a href="adminhome.php"> <i class="jtv jtv-home"></i> <span>Home</span> </a> </li>
    
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv jtv-view-list"></i> <span>Packages</span> </a>
      <ul>
        <li><a href="addpackage.php">Add Package</a></li>
        <li><a href="data-tables.html">Data Tables</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-collection-text"></i> <span>Booking <span class="label label-warning">New</span></span> </a>
      <ul>
        <li><a href="viewbooking.php">View</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-swap-alt"></i> <span>User</span> </a>
      <ul>
        <li><a href="viewuser.php">View</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-swap-alt"></i> <span>Staff</span> </a>
      <ul>
        <li><a href="viewustaff.php">View</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-swap-alt"></i> <span>Lab</span> </a>
      <ul>
        <li><a href="viewlab.php">View</a></li>
      </ul>
    </li>
    <li> <a href="charts.html"> <i class="jtv jtv-trending-up"></i> <span>Charts</span> </a> </li>
    <li> <a href="calendar.html"> <i class="jtv jtv-calendar"></i> <span>Calendar <span class="label label-primary">12</span></span> </a> </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-image"></i> <span>Photo Gallery</span> </a>
      <ul>
        <li><a href="photos.html">Default</a></li>
        <li><a href="photo-timeline.html">Timeline</a></li>
      </ul>
    </li>
    
    
  </ul>
</aside>



<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">User Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "connect.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM tbl_category";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Category Name</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo  "<tr>
												<form action='updatecategory.php' method='post'	>
													<td><input type='text' name='category_id' value=".$row['category_id']." hidden></td>
													<td><input type='text' name='category_name' value=".$row['category_name']."></td>
													<td><input type='submit' value='update'name='submit'></td>";
											
												echo "</form>";
												echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
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