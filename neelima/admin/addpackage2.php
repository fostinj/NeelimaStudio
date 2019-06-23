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
<!-- <SCRIPT type="text/javascript">
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
</SCRIPT> -->


<body>

<section id="content">
  <div class="container">
    <header class="page-header">
      <h3>ADD PACKAGE</h3>
    </header>
    <div class="tile">
      
      <div class="t-body tb-padding">
        <form  method="POST" name="add_name" id="add_name" enctype="multipart/form-data">
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
          <table class="table table-bordered" id="dynamic_field">
							<tr>
								<td><input type="text" name="event[]" placeholder="Enter Included Events" class="form-control name_list" /></td>
								<td><input type="number" name="photography[]"  placeholder="Enter Number of Photography" class="form-control name_list" /></td>
                                <td><input type="number" name="videography[]"  placeholder="Enter Number of Videography" class="form-control name_list" /></td>
								<td><input type="text" name="services[]" placeholder="Enter Included Services" class="form-control name_list" /></td>
                                

								<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
							</tr>
						</table>
          <!-- <div class="form-group">
            <label>Total Photography</label>
            <input type="number" name="photography_no" class="form-control"  placeholder="Enter Total Photography" required>
          </div>
          <div class="form-group">
            <label>Total Videography</label>
            <input type="number" name="videography_no" class="form-control"  placeholder="Enter Total Videography" required>
          </div> -->
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
            <label>Payment Details</label>
            <input type="text" name="payment_details" class="form-control"  placeholder="Enter Payment Details" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" id="img" onchange="validateImage()" accept="image/*" class="form-control"  placeholder="Add Image" required>
          </div>
          <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
          <a href="viewpackage.php" class="btn btn-success pull-right">View Packages</a>
		</form>
	
      </div>
    </div>

</section>
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="event[]" placeholder="Enter Included Events" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>').append('<tr id="row'+i+'"><td><input type="number" name="videography[]"  placeholder="Enter Number of Videography" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>').append('<tr id="row'+i+'"><td><input type="text" name="services[]" placeholder="Enter Included Services" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>').append('<tr id="row'+i+'"><td><input type="text" name="services[]" placeholder="Enter Included Services" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"package_insert.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});
	
});
</script>



    <script src="jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<?php
include 'adminfooter.php';
?>