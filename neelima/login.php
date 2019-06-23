<?php
session_start();
include 'connect.php';
if(isset($_POST['login']))
{
	$email=$_POST["email"];
	$password=$_POST["password"];

	$sql = "select * from tbl_login where email='$email' and password=SHA1('$password')";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$num = mysqli_num_rows($result);
	$id=$row['login_id'];
    if($row['status'] != 0)
    {
	if ($num==1 && $row['user_id'] == 1)
	{
		$query = "select * from tbl_login where login_id='$id'";
		$details = mysqli_fetch_array(mysqli_query($con,$query));
		$_SESSION['login_id'] = $row['login_id'];
		$_SESSION['adminLogin'] = "active";
		header("location: ./admin/adminhome.php");
		
       
		
    }	
    elseif ($num==1 && $row['user_id'] == 2)
    {
            $query = "select * from tbl_ureg where login_id='$id'";
			$details = mysqli_fetch_array(mysqli_query($con,$query));
			$_SESSION['login_id']=$id; 
			$_SESSION['name']=$details['first_name']." ".$details['last_name'];
			$_SESSION['email'] = $details['email'];
			$_SESSION['mobile']=$details['mobile'];
			$_SESSION['image'] = $details['image'];
			$_SESSION['userLogin'] = "active";
			header("location: userhome.php");
    }
    elseif ($num==1 && $row['user_id'] ==3)
    {
		$query = "select * from tbl_sreg where login_id='$id'";
			$details = mysqli_fetch_array(mysqli_query($con,$query));
			$_SESSION['login_id']=$id; 
			$_SESSION['name']=$details['first_name']." ".$details['last_name'];
			$_SESSION['email'] = $details['email'];
			$_SESSION['mobile']=$details['mobile'];
			$_SESSION['image'] = $details['image'];
        	$_SESSION['staffLogin'] = "active";
        header("location: ./staff/staffhome.php");
    }
    elseif ($num==1 && $row['user_id'] ==4)
    {
		$query = "select * from tbl_lreg where login_id='$id'";
			$details = mysqli_fetch_array(mysqli_query($con,$query));
			$_SESSION['login_id']=$id; 
			$_SESSION['name']=$details['lab_name'];
			$_SESSION['email'] = $details['email'];
			$_SESSION['mobile']=$details['mobile'];
			$_SESSION['image'] = $details['image'];
        	$_SESSION['labLogin'] = "active";
        header("location: labhome.php");
    }
	else {
		echo "<script> alert('Account Blocked..!') </script>";
    }
}
else
{
    echo "<script> alert('Invalid Email or Password..!') </script>";
}
	
}
?>
<?php
include 'header.php';
?>
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Login</h2>
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="login.php">Login</a>
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
								<h3 class="mb-30 title_color">Login</h3>
								<form method="post" action="">				
									<div class="mt-10">
										<input type="email" name="email" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required class="single-input">
									</div>
									
									<div class="mt-10">
										<input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
									</div>
									<div class="button-group-area mt-10">
									<button type="submit" name="login" value="Login" class="genric-btn danger-border circle">Login</button>
									<a href="mail/index.php">Forget Password?</a>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
<?php
include 'footer.php';
?>