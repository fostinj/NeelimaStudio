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
<script>
function getcategory(val) {
	$.ajax({
	type: "POST",
	url: "get_subcategory.php",
	data:'category_id='+val,
	success: function(data){
		$("#subcategory-list").html(data);
	}
	});
}

</script>

<body>

<section id="content">
  <div class="container">
    <header class="page-header">
      <h3>ADD SERVICES</h3>
    </header>
    <div class="tile">
      
      <div class="t-body tb-padding">
          

        <div class="container-fluid">
  		<div class="col-sm-8">
    	<div class="row">
     	 <div class="col-xs-12">
		<form name="insert" action="" method="post">
		<table width="100%" height="117"  border="0">
		<tr>
		<th width="27%" height="63" scope="row">Category :</th>
		<td width="73%"><select onChange="getcategory(this.value);"  name="category_id" id="category" class="form-control" >
		<option value="">Select Category</option>
		<?php $query =mysqli_query($con,"SELECT * FROM tbl_category");
		while($row=mysqli_fetch_array($query))
		{ ?>
		<option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>
		<?php
		}
		?>
		</select></td>
		</tr>
		<tr>
		<th scope="row">Subcategory :</th>
		<td><select name="subcategory_id[]" id="subcategory-list" class="form-control">
		<option value="">Select</option>
		</select></td>
		</tr>
		</table>

    <div class="form-group">
            <label>Services Name</label>
            <input type="text" name="services_name" class="form-control"  placeholder="Enter Services Name" required>
          </div>
          <div class="form-group">
            <label>Services Rate</label>
            <input type="text" name="services_rate" class="form-control"  placeholder="Enter Services Rate" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
          <a href="viewservices.php" class="btn btn-success pull-right">View Services</a>
		</form>
		</div>
		</div>
 		</div><!--/center-->
		</div><!--/container-fluid-->



          
            
          

        
      </div>
    </div>

</section>


<?php
	if(isset($_POST["submit"]))
	{
        $category=$_POST['category_id'];
        $subcategory_id=$_POST["subcategory_id"];
        $services=$_POST["services_name"];
        $rate=$_POST["services_rate"];
        
        $sql2="select * from `tbl_services` where services_name='$services'";
	      $result2=mysqli_query($con,$sql2)or die(mysql_error());
	      $arr=mysqli_fetch_array($result2);
	      if(mysqli_num_rows($result2) > 0)
	      {
        echo"<script>alert('Service already exist..!!')</script>";
        echo "<script type='text/javascript'>window.location.href = '../admin/addservices.php'</script>";
        }
        else
        {
     
          $sql="insert into `tbl_services` (`category_id`,`subcategory_id`, `services_name`,`services_rate`,`status` ) values ('$category','$subcategory_id','$services','$rate','1')";
     
          $result=mysqli_query($con,$sql);
          if($result)
          {
          echo"<script>alert('Services Added Successfully');</script>";
          echo "<script type='text/javascript'>window.location.href = '../admin/addservices.php'</script>";
          }
          else
          {
          echo"<script>alert('Unsuccessfull');</script>";
          echo "<script type='text/javascript'>window.location.href = '../admin/addservices.php'</script>";
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