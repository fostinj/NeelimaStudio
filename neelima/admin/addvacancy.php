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
      <h3>ADD JOB VACANCY</h3>
    </header>
    <div class="tile">
      
      <div class="t-body tb-padding">
        <form  method="POST" enctype="multipart/form-data">
          <!-- <div class="form-group">
            <label>Vacancy Name</label>
            <input type="text" name="vacancy_name" class="form-control"  placeholder="Enter Vacancy Name" required>
          </div> -->
          <div class="form-select">
                        <label>Designation</label>
                        <select name="designation_id">
                        <option value="">Designation</option>
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
                     
          <div class="form-group">
            <label>Number of Vacancies</label>
            <input type="number" name="vacancy_number" class="form-control"  placeholder="Enter Number of Vacancy" required>
          </div>
          <div class="form-group">
            <label>Experience Required</label>
            <input type="text" name="experience" class="form-control"  placeholder="Enter Experience Required" required>
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control"  placeholder="Enter Description" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
          <a href="viewvacancy.php" class="btn btn-success pull-right">View Vacancy</a>

        </form>

      </div>
    </div>

</section>


<?php
	if(isset($_POST["submit"]))
	{
        // $vname=$_POST["vacancy_name"];
        $designation=$_POST["designation_id"];
        $vnumber=$_POST["vacancy_number"];
		    $exp=$_POST["experience"];
        $description=$_POST['description'];
      $sql="insert into `tbl_vacancy` (`designation_id`, `vacancy_number`,`experience`,`description`,`status` ) values ('$designation','$vnumber','$exp','$description','1')";
      $result=mysqli_query($con,$sql);
      if($result)
      {
      echo"<script>alert('Vacancy Added Successfully');</script>";
      echo "<script type='text/javascript'>window.location.href = '../admin/addvacancy.php'</script>";
      }
      else
       {
        echo"<script>alert('Unsuccessfull');</script>";
        echo "<script type='text/javascript'>window.location.href = '../admin/addvacancy.php'</script>";
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