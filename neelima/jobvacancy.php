<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['userLogin']))
{
	include 'header.php';
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

<!--================Home Banner Area =================-->
                <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Vacancy</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="jobvacancy.php">Job Vacancy</a>
						</div>
					</div>
				</div>
            </div>
        </section>
<!--================End Home Banner Area =================-->
<div class="section-top-border">
						<h3 class="mb-30 title_color">JOB VACANCY</h3>
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<!-- <div class="serial">#</div> -->
									<div class="serial">#</div>
									<div class="serial">Job</div>
									<div class="serial">Vacancies</div>
									<div class="serial">Experience</div>
									<div class="percentage">Description</div>
								</div>
                                <?php
                                    // Include config file
                                    require_once "connect.php";
                    
                                    // Attempt select query execution
                                    $sql = "SELECT tbl_vacancy.*,tbl_designation.* FROM tbl_vacancy,tbl_designation WHERE tbl_vacancy.designation_id=tbl_designation.designation_id AND tbl_vacancy.status='1'";
                                    $result=mysqli_query($con,$sql);
                                    $rowcount = 1;
                                    while($row=mysqli_fetch_array($result))
                                        {
                                            $vacancy_id=$row['vacancy_id'];
                                        ?>
                                    <form method="post" action="applyvacancy.php" >

								<div class="table-row">
									<div class="serial"><?php echo $rowcount ?></div>
									<div class="serial"><?php echo $row['designation_name'] ?></div>
									<div class="serial"><?php echo $row['vacancy_number'] ?></div>
									<div class="serial"><?php echo $row['experience'] ?></div>
									<div class="percentage"><?php echo $row['description'] ?></div>
						            <!-- <a href="#" class="genric-btn success circle">Apply</a> -->
									<input type="hidden" name="vacancy_id" value="<?php echo $vacancy_id ?>">
                                    <input type="submit" name="submit" value="Apply" class="genric-btn success circle">
								</div>
                                </form>
								<?php
                                 $rowcount++;
                                        }
                                        ?>
							</div>
                           
						</div>
                        
					</div>
<?php
include 'footer.php';
?>