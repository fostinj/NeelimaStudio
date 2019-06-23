<?php
session_start();
include 'connect.php';
if ($_SESSION['adminLogin'] != 'active')
{
    header('location:../index.php');
}

include 'adminsidebar.php';
?>
<?php

    $sql="SELECT * FROM tbl_lreg JOIN tbl_login ON tbl_lreg.login_id = tbl_login.login_id WHERE tbl_lreg.login_id=".$_GET['id'];
	$obj=mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($obj))
    {
        $image=$row['image'];
    ?>
    <!-- <section id="content">
    <div class="t-body">
            <div class="list-group lg-alt"> <a href="#" class="list-group-item media">
              <div class="pull-left"> <img class="img-circle pull-left" src="../img/uploads/users/" alt="" width="40" height="40"> </div>
              <div class="media-body">
                <div class="list-group-item-heading"></div>
                <small class="list-group-item-text">Lorem ipsum dolor sit amet, parturient tempor sit, rutrum pulvinar mattis eget magna.</small> <small class="list-group-item-text">5 Hours ago</small> </div>
              </a> <a href="#" class="list-group-item media">
              
              </a> <a class="view-more" href="#">View more</a> </div>
          </div>
        </div>
        </section> -->

        <section id="content">
  <div class="container">
    <header class="page-header">
      <h3><?php echo $row['lab_name'] ?>
      <!-- <small>Web/UI Developer, Kandy, Sri Lanka</small></h3> -->
    </header>
    <div class="tile" id="profile-main">
      <div class="pm-overview c-overflow-dark">
        <div class="pmo-pic">
          <div class="p-relative"> <a href="#"> <img class="img-responsive" src="../img/uploads/lab/<?php echo $image ?>" alt=""> </a>
            
            <a href="#" class="pmop-edit"> <i class="jtv jtv-camera"></i> <span class="hidden-xs">Update Profile Picture</span> </a> </div>
          <div class="pmo-stat">
            <h2 class="m-0 c-white"><?php echo $row['lab_name'] ?></h2></div>
        </div>
        <div class="pmo-block pmo-contact hidden-xs">
          <h2>Contact</h2>
          <ul>
            <li><i class="jtv jtv-phone"></i><?php echo $row['mobile'] ?></li>
            <li><i class="jtv jtv-email"></i><?php echo $row['email'] ?></li>
            <!-- <li> <i class="jtv jtv-pin"></i>
              <address class="m-b-0">
              1234 Wood Street Cranford,<br/>
              GH 45678<br>
              UK
              </address>
            </li> -->
          </ul>
        </div>
        
      </div>
      <div class="pm-body clearfix">
        <ul class="tab-nav tn-justified">
          <li class="active"><a href="#">About</a></li>
          <!-- <li><a href="#">Bookings</a></li> -->
        </ul>
        
        <div class="pmb-block">
          <div class="pmbb-header">
            <h2><i class="jtv jtv-account m-r-5"></i> Basic Information</h2>
            <ul class="actions">
              <li class="dropdown"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
                <ul class="dropdown-menu pull-right">
                  <li> <a data-pmb-action="edit" href="#">Edit</a> </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="pmbb-body p-l-30">
            <div class="pmbb-view">
              <dl class="dl-horizontal">
                <dt>Lab Name</dt>
                <dd><?php echo $row['lab_name'] ?></dd>
              </dl>
              
              
              <dl class="dl-horizontal">
                <dt>Email</dt>
                <dd><?php echo $row['email'] ?></dd>
              </dl>
              <dl class="dl-horizontal">
                <dt>Mobile</dt>
                <dd><?php echo $row['mobile'] ?></dd>
              </dl>
            </div>
            
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


        <?php
    }
    
include 'adminfooter.php';
    ?>
