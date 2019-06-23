<?php
session_start();

include 'connect.php';
if ($_SESSION['userLogin'] != 'active')
{
    header('location:login.php');
}
else
{
    include 'userheader.php';
    $id = $_SESSION['login_id'];
    $name = $_SESSION['name'];
    $mobile = $_SESSION['mobile'];
    $image = $_SESSION['image'];
    
}
?>
<section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Apply for Job</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="applyvacancy.php">Apply Job</a>
						</div>
					</div>
				</div>
            </div>
</section>
<?php
if(isset($_POST['submit']))
{
    // $login_id = $_POST['login_id'];
    // $job = $_POST['designation_name'];
    // $vacancy = $_POST['vacancy_number'];
    $vacancy = $_POST['vacancy_id'];
}
?>
<div class="whole-wrap">
				<div class="container">
					<div class="section-top-border">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<h3 class="mb-30 title_color">APPLY FOR JOB</h3>
								<h6 class="mb-30 title_color">Please fill the following details.</h6>
								<form name="form1"  method="POST" action="applyvacancyaction.php" id="form" enctype="multipart/form-data">
									<div class="mt-10">Upload Experience Proof:
										<input type="file" name="experience_proof" id="experience_proof" accept="application/pdf,application/vnd.ms-excel" placeholder="Upload Experience Proof"required class="single-input">
									</div>
									<input type="hidden" name="vacancy_id" value="<?php echo $vacancy; ?>">
                                    <input type="submit" name="apply" value="Apply" class="genric-btn success circle">
									
									
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
    <?php
    include 'footer.php';
    ?>