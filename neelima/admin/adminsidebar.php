
<!DOCTYPE html>
<html lang="en">

<!--index.html 17:55:36 GMT -->
<head>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
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
    <!-- <li class="dropdown hidden-xs"> <a href="#" data-toggle="dropdown" class="hi-events"> <i class="jtv jtv-calendar"></i> </a>
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
    </li> -->
    
    <!-- Search -->
    <!-- <li class="top-search">
      <input class="ts-input" id="myInput" placeholder="Search..." type="text">
      <i class="ts-reset jtv jtv-close"></i> </li> -->
    
    <!-- Settings -->
    <!-- <li class="pull-right dropdown hidden-xs"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
      <ul class="dropdown-menu">
        
        
        <li><a href="#">Account Settings</a></li>
        <li><a href="#">Other Settings</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </li> -->
    
    <!-- Quick Apps -->
    <!-- <li class="hidden-xs dropdown pull-right"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-apps"></i> </a>
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
    </li> -->
    <!-- Time -->
    <!-- <li class="pull-right hidden-xs">
      <div id="time"> <span id="t-hours"></span> <span id="t-min"></span> <span id="t-sec"></span> </div>
    </li>
  </ul> -->
  <!--------------------------------------Notification Area---------------->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <!-- <a class="navbar-brand" href="#">PHP Notification Tutorial</a> -->
     </div>
     <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>
    </div>
   </nav>
   <!------------------------------------>

</header>
<aside id="sidebar"> 
  
  <!--| MAIN MENU |-->
  <ul class="side-menu">
    <li class="sm-sub sms-profile"> <a class="clearfix" href="#"> <img src="img/profile-pic.jpg" alt=""> <span class="f-11"> <span class="d-block">Admin</span> <small class="text-lowercase"></small> </span> </a>
      <ul>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </li>
    <li class="active"> <a href="adminhome.php"> <i class="jtv jtv-home"></i> <span>Home</span> </a> </li>
    
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv jtv-view-list"></i> <span>Packages</span> </a>
      <ul>
        <li><a href="addpackage.php">Add Package</a></li>
        <li><a href="viewpackage.php">View Package</a></li>
        <li><a href="addcategory.php">Add Category</a></li>
        <li><a href="addsubcategory.php">Add Subategory</a></li>
        <li><a href="addgallery.php">Add Image</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv jtv-view-list"></i> <span>Services</span> </a>
      <ul>
        <li><a href="addservices.php">Add Services</a></li>
        <li><a href="viewservices.php">View Services</a></li>
        <li><a href="addremainder.php">Add Remainder</a></li>
        <li><a href="addvacancy.php">Add Job Vacancy</a></li>
<!--         <li><a href="addrates.php">Add Rate</a></li>
 -->        <li><a href="addnotification.php">Add Notification</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-collection-text"></i> <span>Customized Booking <span class="label label-warning"></span></span> </a>
      <ul>
        <li><a href="viewapprovedservicesbooking.php">Approved</a></li>
        <li><a href="viewunapprovedservicesbooking.php">Unapproved</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-collection-text"></i> <span>Booking <span class="label label-warning"></span></span> </a>
      <ul>
        <li><a href="viewapprovedbooking.php">Approved</a></li>
        <li><a href="viewunapprovedbooking.php">Unapproved</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-collection-text"></i> <span>Applicants <span class="label label-warning"></span></span> </a>
      <ul>
        <li><a href="viewapprovedapplicants.php">Approved</a></li>
        <li><a href="viewunapprovedapplicants.php">Unapproved</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-swap-alt"></i> <span>User</span> </a>
      <ul>
        <li><a href="viewuser.php">View</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-swap-alt"></i> <span>Staff</span> </a>
      <ul>
        <li><a href="viewstaff.php">View</a></li>
      </ul>
    </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-swap-alt"></i> <span>Lab</span> </a>
      <ul>
        <li><a href="viewlab.php">View</a></li>
      </ul>
    </li>
    <!-- <li> <a href="charts.html"> <i class="jtv jtv-trending-up"></i> <span>Charts</span> </a> </li>
    <li> <a href="calendar.php"> <i class="jtv jtv-calendar"></i> <span>Calendar <span class="label label-primary"></span></span> </a> </li>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv-image"></i> <span>Photo Gallery</span> </a>
      <ul>
        <li><a href="photos.html">Default</a></li>
        <li><a href="photo-timeline.html">Timeline</a></li>
      </ul>
    </li> -->
    <li> <a href="logout.php"> <i></i> <span>Log Out</span> </a> </li>

    
    
  </ul>

</aside>
