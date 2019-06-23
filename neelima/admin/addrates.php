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
<body>

<section id="content">
  <div class="container">
    <header class="page-header">
      <h3>ADD RATE</h3>
    </header>
    <div class="tile">
      
      <div class="t-body tb-padding">
        <form  method="POST" enctype="multipart/form-data">
                        <label>Category</label>
                        <select name="category_id">
                        <option value="">Category</option>
                        <?php
                            $sqq = "select category_id,category_name from tbl_category where status = 1 ";
                            $result = mysqli_query($con, $sqq);
                            while($row=mysqli_fetch_assoc($result))
                                {

                                ?>
                                <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
   
                                <?php
                                }
                          ?>
                        </select>


                        <label>Service</label>
                        <select name="services_id">
                        <option value="">Service</option>
                        <?php
                            $sqq = "select * from tbl_services where `status` = '1' ";
                            $result = mysqli_query($con, $sqq);
                            while($row=mysqli_fetch_assoc($result))
                                {

                                ?>
                                <option value="<?php echo $row['services_id']; ?>"><?php echo $row['services_name']; ?></option>
   
                                <?php
                                }
                          ?>
                        </select>

          
                     
          <div class="form-group">
            <label>Service Rate</label>
            <input type="number" name="services_rate" class="form-control"  placeholder="Enter Service Rate" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-sm m-t-10">Submit</button>
          <a href="viewrates.php" class="btn btn-success pull-right">View Rates</a>

        </form>

      </div>
    </div>

</section>
<?php
	if(isset($_POST["submit"]))
	{
        $category=$_POST['category_id'];
        $service=$_POST['services_id'];
        $rate=$_POST["services_rate"];
      $sql="insert into `tbl_rate` (`category_id`, `services_id`,`rate`,`status` ) values ('$category','$service','$rate','1')";
      $result=mysqli_query($con,$sql);
      if($result)
      {
      echo"<script>alert('Rate Added Successfully');</script>";
      echo "<script type='text/javascript'>window.location.href = '../admin/addrates.php'</script>";
      }
      else
       {
        echo"<script>alert('Unsuccessfull');</script>";
        echo "<script type='text/javascript'>window.location.href = '../admin/addrates.php'</script>";
       }
      
    }
?>
    
<?php
include 'adminfooter.php';
?>