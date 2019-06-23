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
      <h3>ADD SUBCATEGORY</h3>
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
                     
          
          <div class="form-group">
            <label>Subcategory Name</label>
            <input type="text" name="subcategory_name" class="form-control"  placeholder="Enter Subcategory Name" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
          <a href="viewsubcategory.php" class="btn btn-success pull-right">View Subcategory</a>

        </form>

      </div>
    </div>

</section>


<?php
	if(isset($_POST["submit"]))
	{
        $category=$_POST["category_id"];
        $subcategory=$_POST["subcategory_name"];
      $sql="insert into `tbl_subcategory` (`subcategory_name`, `category_id`,`status` ) values ('$subcategory','$category','1')";
      $result=mysqli_query($con,$sql);
      if($result)
      {
      echo"<script>alert('Subcategory Added Successfully');</script>";
      echo "<script type='text/javascript'>window.location.href = '../admin/addsubcategory.php'</script>";
      }
      else
       {
        echo"<script>alert('Unsuccessfull');</script>";
        echo "<script type='text/javascript'>window.location.href = '../admin/addsubcategory.php'</script>";
       }
      
    }
?>
    
<?php
include 'adminfooter.php';
?>