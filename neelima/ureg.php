<?php
include 'connect.php';
session_start();
if(isset($_POST['submit']))
{
	$firstName=$_POST["first_name"];
	$lastName=$_POST["last_name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$mobile=$_POST["mobile"];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"img/uploads/users/".$image);
    // $imageName = mysql_real_escape_string($_FILES["image"]["name"]);
    // $imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
    // $imageType = mysql_real_escape_string($_FILES["image"]["type"]);
    // if(substr($imageType,0,5) == "image")
    // {
    //     echo "Working";
    // }
    // else
    // {
    //     echo "Only Images are allowed";
    // }
	
	$sql2="select * from `tbl_login` where email='$email'";
	$result2=mysqli_query($con,$sql2)or die(mysql_error());
	$arr=mysqli_fetch_array($result2);
	if(mysqli_num_rows($result2) > 0)
	{
        echo"<script>alert('Email already exist..!!')</script>";
        echo "<script type='text/javascript'>window.location.href = 'ureg.php'</script>";
	}
	else {
	    $password=SHA1($password);
		$sql1="insert into `tbl_login`(`email`, `password`, `user_id`,`status`) values ('$email','$password','2','1')";
        $result1=mysqli_query($con,$sql1)or die(mysqli_error($con));
        
        // $query="select login_id from `tbl_login` where email='".$email."' and password='".$password."'";
        // $log_id=mysqli_query($con,$query)or die(mysqli_error($con));
        $login_id = $con->insert_id;


		$sql="insert into `tbl_ureg` (`first_name`, `last_name`, `mobile`,`image`,`login_id` ) values ('$firstName','$lastName','$mobile','$image','$login_id')";
		$result3=mysqli_query($con,$sql);
        
        echo"<script>alert('Registration Successfull');</script>";
        echo "<script type='text/javascript'>window.location.href = 'login.php'</script>";
    }		
}
?>
<?php
include 'header.php';
?>        
        
       	<script>	
function fName(){
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
		

		 
		
        function gEmail(){
           var email=form1.email.value;
                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>email.length)){
                    
                    form1.email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
        }
        function gPhone(){
           var mobile=form1.mobile.value;
                if(isNaN(mobile)){
                    
                    alert("Phone Number Only Contain Digits");
                    form1.mobile.focus();
                    return false;
                }
                if(mobile.length !== 10){
                   form1.mobile.focus();
                    alert("Phone Number must be 10 Digits");
                    
                    return false;
                }
        }
// function Adra(){
//             var address= form1.address.value;
//                 if((address===null)||(address.length<3)){
                    
//                     alert("Enter Full Address");
//                     form1.address.focus();
//                     return false;
//                 }
//                 var address=/^[a-zA-Z]{3,20}$/;
//                 if(form1.address.value.search(address)==-1)
//                  {
//                       alert("Enter correct  Address");
//                       form1.address.focus();
                      
//                       return false;
//                     }
//                 if((address.length>200)){
                   
//                     alert("Address Must Not Exceed 199 Characters");
//                   form1.address.focus();
//                     return false;
//                 }
//         }
        
         function gPwd(){
           var password= form1.password.value;
               
                if(password.length < 4 ){
                    form1.password.style.border = "1px solid red";
                    form1.password.focus();
                    alert("Password Should contain atleast 4 characters");
                    return false;
                }
                
        } 
		
		//////////////////////////////////////////////////////////////////
		
		
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
				
				
				
				
	   var   last_name= form1.last_name.value;
                if((last_name===null)||(last_name.length<3)){
                    form1.last_name.style.border = "1px solid red";
                    alert("Enter Full Name");
                    form1.last_name.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z ]{4,25}$/;
                if(form1.last_name.value.search(last_name)==-1)
                 {
                      alert("Enter correct  Name");
                      form1.last_name.focus();
                      form1.last_name.style.border = "1px solid red";
                      return false;
                    }
                if((last_name.length>25)){
                    form1.last_name.style.border = "1px solid red";
                    alert("Name Must Not Exceed 24 Characters");
                   form1.last_name.focus();
                    return false;
                }
                
				
				
				
       var mobile=form1.mobile.value;
                if(isNaN(mobile)){
                    form1.mobile.style.border = "1px solid red";
                    alert("Phone Number Only Contain Digits");
                   form1.mobile.focus();
                    return false;
                }
                if(mobile.length !== 10){
                    form1.mobile.style.border = "1px solid red";
                    alert("Phone Number must be 10 Digits");
                    form1.mobile.focus();
                    return false;
                }
                
                
                
                
          var email=form1.email.value;
                var atpos = email.indexOf("@");
                var dotpos = email.lastIndexOf(".");
                if((atpos<1)||(dotpos<atpos+2)||(dotpos+2>email.length)){
                    
                   form1.email.focus();
                    alert("Enter a Valid Email Address");
                    return false;
                }
				
			
		 var address= form1.address.value;
                if((address===null)||(address.length<3)){
                    form1.address.style.border = "1px solid red";
                    alert("Enter Full Address");
                    form1.address.focus();
                    return false;
                }
                var first_name=/^[a-zA-Z ]{4,25}$/;
                if(form1.address.value.search(first_name)==-1)
                 {
                      alert("Enter correct  Address");
                      form1.address.focus();
                      form1.address.style.border = "1px solid red";
                      return false;
                    }
                if((address.length>100)){
                    form1.address.style.border = "1px solid red";
                    alert("  Address Must Not Exceed 99 Characters");
                   form1.address.focus();
                    return false;
                }
				
	
	
                
          var password= form1.password.value;
                
  
              
                if(password.length < 4 ){
                   form1.password.style.border = "1px solid red";
                   form1.password.focus();
                    alert("Password Should contain atleast 4 characters");
                    return false;
                }
                
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
                alert("Photo only allows file types of GIF, PNG, JPG, and JPEG");

            }
        }
    }
</SCRIPT>

    <body>
                <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Registration</h2>
						<div class="page_link">
							<a href="index.html">Home</a>
							<a href="ureg.php">Register</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        <div class="whole-wrap">
				<div class="container">
					
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<h3 class="mb-30 title_color">Registration</h3>
								<form name="form1"  method="POST" action="#" id="form" enctype="multipart/form-data" onSubmit="return addUser()">
									<div class="mt-10">
										<input type="text" name="first_name" id="first_name" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required onChange="return fName()" class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="last_name" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required onChange="return lName()" onChange="return fName()" class="single-input">
									</div>
									<div class="mt-10">
										<input type="mobile" name="mobile" placeholder="Mobile Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile Number'" required onChange="return gPhone()" class="single-input">
									</div>
									<div class="mt-10">
										<input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required onChange="return gEmail()" class="single-input">
									</div>
									
									<div class="mt-10">
										<input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required onChange="return gPwd()" class="single-input">
									</div>
									<div class="mt-10">
                                        <input type="file" name="image"  id="fileChooser" accept="image/*" onchange="return ValidateFileUpload()" placeholder="Select Image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Select Image'" required>
                                        <img src="images/noimg.jpg" id="blah">
                                    </div>
									
									
									
									<div class="button-group-area mt-10">
									 <button type="submit" name="submit" value="" class="genric-btn danger-border circle">Register</button>
									</div>
									<a href="login.php">Already have an Account? Login Here.</a>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
        
        
        
 <?php
 include 'footer.php';
 ?>