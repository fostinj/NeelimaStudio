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
<SCRIPT type="text/javascript">
    function ValidateFileUpload() {
        var fuData = document.getElementById('fileChooser');
        var FileUploadPath = fuData.value;

//To check if user upload any file
        if (FileUploadPath == '') {
            alert("Please upload an image");

        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "gif" || Extension == "png"
                    || Extension == "jpeg" || Extension == "jpg") {

// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            } 

//The file upload is NOT an image
else {
                alert("Photo only allows file types of GIF, PNG, JPG, and JPEG. ");

            }
        }
    }
</SCRIPT>

<body>

<section id="content">
  <div class="container">
    <header class="page-header">
      <h3>EDIT VACANCY</h3>
      
      
    </header>
    
    <div class="tile">
      
      <div class="t-body tb-padding">
      <a href="addvacancy.php" class="btn btn-success pull-right">Add Vacancy</a>
                    
        <form  method="POST" enctype="multipart/form-data">
          <!-- <div class="form-group">
            <label>Vacancy Name</label>
            <input type="text" name="vacancy_name" class="form-control"  placeholder="Enter Vacancy Name" required>
          </div> -->
          <div class="form-select">
                    <?php
                    // Include config file
                    require_once "connect.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT tbl_vacancy.*,tbl_designation.* FROM tbl_vacancy,tbl_designation WHERE tbl_vacancy.designation_id=tbl_designation.designation_id AND tbl_vacancy.status='1' AND tbl_designation.status='1' AND tbl_vacancy.vacancy_id=".$_GET['id'];
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result))
                    {
                        
                            ?>
                            
                        <label>Designation</label>
                        <select name="designation_id">
                        <option value=""><?php echo $row['designation_name']; ?></option>
                        <?php
                        }
                        ?>
                            <?php
                            $sqq = "select * from tbl_designation where status = 1 ";
                            $result = mysqli_query($con, $sqq);
                            while($row=mysqli_fetch_assoc($result))
                                {

                                ?>
                                <option value="<?php echo $row['designation_id']; ?>"><?php echo $row['designation_name']; ?></option>
                                <?php
                                }
                                ?>
                                
                        </select>

                        <?php
                    // Include config file
                    require_once "connect.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT tbl_vacancy.*,tbl_designation.* FROM tbl_vacancy,tbl_designation WHERE tbl_vacancy.designation_id=tbl_designation.designation_id AND tbl_vacancy.status='1' AND tbl_designation.status='1' AND tbl_vacancy.vacancy_id=".$_GET['id'];
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result))
                    {
                       ?>
                     
          <div class="form-group">
            <label>Number of Vacancies </label>
            <input type="number" name="vacancy_number" value="<?php echo $row['vacancy_number']; ?>" class="form-control"  placeholder="Enter Number of Vacancies" required>
          </div>
          <div class="form-group">
            <label>Experience Required</label>
            <input type="text" name="experience" value="<?php echo $row['experience']; ?>" class="form-control"  placeholder="Enter Experience Needed" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" value="<?php echo $row['description']; ?>" class="form-control"  placeholder="Enter Description" required>
          </div>
          <button type="submit" name="update" class="btn btn-primary btn-sm m-t-10">Update</button>
          <a href="viewvacancy.php" class="btn btn-warning pull-right">View</a>
                    <?php
                    }
                    ?>
        </form>

      </div>
    </div>

</section>


<?php
	if(isset($_POST["update"]))
	{
        // $vname=$_POST["vacancy_name"];
        $designation=$_POST["designation_id"];
        $vnumber=$_POST["vacancy_number"];
		    $exp=$_POST["experience"];
        $description=$_POST['description'];
      $sql="UPDATE`tbl_vacancy` SET `designation_id`='$designation',`vacancy_number`='$vnumber',`experience`='$exp',`description`='$description'";
      $result=mysqli_query($con,$sql);
      $row=mysqli_fetch_array($result);
      $num = mysqli_num_rows($result);
      if ($num==1)
      {
      echo"<script>alert('Vacancy Updated Successfully');</script>";
      echo "<script type='text/javascript'>window.location.href = '../admin/viewvacancy.php'</script>";
      }
      else
       {
        echo"<script>alert('Updating Failed');</script>";
        echo "<script type='text/javascript'>window.location.href = '../admin/viewvacancy.php'</script>";
        }
  }
  // else
  // {
  //   echo"<script>alert('Package Adding Failed');</script>";
  //   echo "<script type='text/javascript'>window.location.href = '../admin/addpackage.php'</script>";
  // }
?>
    
<?php
include 'adminfooter.php';
?>