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

<!-- Vendor CSS -->
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="css/bootstrap-select.css" rel="stylesheet">
<link href="css/jquery.nouislider.min.css" rel="stylesheet">
<link href="css/summernote.css" rel="stylesheet">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="css/farbtastic.css" rel="stylesheet">
<link href="css/chosen.min.css" rel="stylesheet">
<link href="css/jquery.mCustomScrollbar.min.css" rel="stylesheet">

<!-- CSS -->
<link href="css/main.css" rel="stylesheet">
</head>
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



<body>

<section id="content">
  <div class="container">
    <header class="page-header">
      <h3>ADD PACKAGE</h3>
    </header>
    <div class="tile">
      
      <div class="t-body tb-padding">
        <form  method="POST" enctype="multipart/form-data">
          <!-- <div class="form-group">
            <label>Vacancy Name</label>
            <input type="text" name="vacancy_name" class="form-control"  placeholder="Enter Vacancy Name" required>
          </div> -->
          <div class="form-select">
                        <label>Category</label>
                        <select name="category_id">
                        <option value="">Category</option>
                        <?php
                            $sqq = "select * from tbl_category where status = 1 ";
                            $result = mysqli_query($con, $sqq);
                            while($row=mysqli_fetch_assoc($result))
                                {

                                ?>
                                <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
   
                                <?php
                                }
                          ?>
                        </select>

                        <label>Package Type</label>
                        <select name="type_id">
                        <option value="">Package Type</option>
                        <?php
                            $sqq = "select * from tbl_type where status = 1 ";
                            $result = mysqli_query($con, $sqq);
                            while($row=mysqli_fetch_assoc($result))
                                {

                                ?>
                                <option value="<?php echo $row['type_id']; ?>"><?php echo $row['type_name']; ?></option>
   
                                <?php
                                }
                          ?>
                        </select>


    <div class="form-group">
            <label>Package Name</label>
            <input type="text" name="package_name" class="form-control"  placeholder="Enter Package Name" required>
          </div>
          <div class="form-group">
            <label>Functions Covering</label>
            <input type="text" name="event" class="form-control"  placeholder="Enter Functions Covering" required>
          </div>
          <div class="form-group">
            <label>Services Included</label>
            <input type="text" name="services" class="form-control"  placeholder="Enter Services Included" required>
          </div>
          <div class="form-group">
            <label>Photography</label>
            <input type="text" name="photography" class="form-control"  placeholder="Enter Total Photography" required>
          </div>
          <div class="form-group">
            <label>Videography</label>
            <input type="text" name="videography" class="form-control"  placeholder="Enter Total Videography" required>
          </div>
          <div class="form-group">
            <label>Album Output Details</label>
            <input type="text" name="album_output" class="form-control"  placeholder="Enter Album Output Details" required>
          </div>
          <div class="form-group">
            <label>Video Output Details</label>
            <input type="text" name="video_output" class="form-control"  placeholder="Enter Video Output Details" required>
          </div>
          <div class="form-group">
            <label>Package Rate</label>
            <input type="number" name="package_rate" class="form-control"  placeholder="Enter Package Rate" required>
          </div>
          <div class="form-group">
            <label>Package Details</label>
            <input type="text" name="package_details" class="form-control"  placeholder="Enter Package Details" required>
          </div>
          <div class="form-group">
            <label>Advanced Payment</label>
            <input type="text" name="payment_details" class="form-control"  placeholder="Enter Payment Details" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" id="img" onchange="validateImage()" accept="image/*" class="form-control"  placeholder="Add Image" required>
          </div>
          
          <button type="submit" name="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
          <a href="viewpackage.php" class="btn btn-success pull-right">View Packages</a>
		</form>
	
      </div>
    </div>

</section>


<?php
	if(isset($_POST["submit"]))
	{
        $category=$_POST['category_id'];
        $type=$_POST["type_id"];
        $pname=$_POST["package_name"];
        $event=$_POST["event"];
        $services=$_POST["services"];
        $photography=$_POST["photography"];
        $videography=$_POST["videography"];
        $album=$_POST["album_output"];
        $video=$_POST["video_output"];
        $rate=$_POST["package_rate"];
        $pdetails=$_POST["package_details"];
        $paydetails=$_POST["payment_details"];
        $image=$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],"../img/uploads/package/".$image);
        
        $sql2="select * from `tbl_package` where package_name='$pname' and category_id='$category' and type_id='$type' and package_rate='$rate' and status='1'";
	      $result2=mysqli_query($con,$sql2)or die(mysql_error());
	      $arr=mysqli_fetch_array($result2);
	      if(mysqli_num_rows($result2) > 0)
	      {
        echo"<script>alert('Similar Package Exist..!!')</script>";
        echo "<script type='text/javascript'>window.location.href = '../admin/addpackage.php'</script>";
        }
        else
        {
     
          $sql="INSERT INTO `tbl_package`(`package_name`,`category_id`,`type_id`,`event`, `photography`, `videography`,`services`, `album_output`, `video_output`, `package_rate`, `package_details`, `payment_details`,`image`, `status`) VALUES ('$pname','$category','$type','$event','$photography','$videography','$services','$album','$video','$rate','$pdetails','$paydetails','$image','1')";
     
          $result=mysqli_query($con,$sql);
          if($result)
          {
          echo"<script>alert('Package Added Successfully');</script>";
          echo "<script type='text/javascript'>window.location.href = '../admin/addpackage.php'</script>";
          }
          else
          {
          echo"<script>alert('Unsuccessfull');</script>";
          echo "<script type='text/javascript'>window.location.href = '../admin/addpackage.php'</script>";
          }
        }
      
    }
?>
    <script src="jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<?php
include 'adminfooter.php';
?>