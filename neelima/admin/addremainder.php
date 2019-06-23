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
<script>
function iName(){
           var first_name=form1.first_name.value;
                if((first_name===null)||(first_name.length<2)){
                    
                    alert("Enter First Name");
                    form1.first_name.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z]{2,20}$/;
                if(form1.first_name.value.search(first_name)==-1)
                 {
                      alert("Enter First Name");
                      form1.first_name.focus();
                      
                      return false;
                    }
                if((first_name.length>20)){
                   
                    alert("Name Must Not Exceed 19 Characters");
                  form1.first_name.focus();
                    return false;
                }
        }
        function  addUser(){
			
			
       var first_name= form1.first_name.value;
                if((first_name===null)||(first_name.length<3)){
                    form1.first_name.style.border = "1px solid red";
                    alert("Enter First Name");
                    form1.first_name.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z ]{4,25}$/;
                if(form1.first_name.value.search(first_name)==-1)
                 {
                      alert("Enter First Name");
                      form1.first_name.focus();
                      form1.first_name.style.border = "1px solid red";
                      return false;
                    }
                if((first_name.length>25)){
                    form1.first_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                   form1.first_name.focus();
                    return false;
                }
                </script>

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
      <h3>ADD REMAINDER</h3>
    </header>
    <div class="tile">
      
      <div class="t-body tb-padding">
        <form  method="POST" enctype="multipart/form-data" onSubmit="return addUser()">
          <div class="form-group">
            <label>Event</label>
            <input type="text" name="event" class="form-control"  placeholder="Enter Event" required onChange="return fName()" class="single-input">
          </div>
          <div class="form-group">
            <label>Event Date</label>
            <input type="date" name="event_date" class="form-control"  placeholder="Enter Event Date" required onChange="return fName()" class="single-input">
          </div>
          <div class="form-group">
            <label>Booked Photographer</label>
            <input type="text" name="booked_photographer" class="form-control"  placeholder="Enter Booked Photographer" required onChange="return fName()" class="single-input">
          </div>
          <div class="form-group">
            <label>Photographer Mobile</label>
            <input type="mobile" name="photographer_mobile" class="form-control"  placeholder="Enter Photographer Number" required onChange="return fName()" class="single-input">
          </div>
          <div class="form-group">
            <label>Booked Videographer</label>
            <input type="text" name="booked_videographer" class="form-control"  placeholder="Enter Booked Videographer" required onChange="return fName()" class="single-input">
          </div>
          <div class="form-group">
            <label>Videographer Mobile</label>
            <input type="mobile" name="videographer_mobile" class="form-control"  placeholder="Enter Videographer Number" required onChange="return fName()" class="single-input">
          </div>
          
          <button type="submit" name="upload" class="btn btn-primary btn-sm m-t-10">Submit</button>
        </form>
      </div>
    </div>
</section>

<?php
	if(isset($_POST["upload"]))
	{
        $event=$_POST["event"];
		$eventDate=$_POST["event_date"];
        $photographer=$_POST["booked_photographer"];
		$photographerMobile=$_POST["photographer_mobile"];
		$videographer=$_POST["booked_videographer"];
		$videographerMobile=$_POST["videographer_mobile"];

      $sql="insert into `tbl_remainder` (`event`, `event_date`, `booked_photographer`,`photographer_mobile`,`booked_videographer`,`videographer_mobile`,`status`) values ('$event','$eventDate','$photographer','$photographerMobile','$videographer','$videographerMobile','1')";
      $result=mysqli_query($con,$sql);
      echo"<script>alert('Successful');</script>";
      echo "<script type='text/javascript'>window.location.href = '../admin/addremainder.php'</script>";
  }
  
?>
    
<?php
include 'adminfooter.php';
?>