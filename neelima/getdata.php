<?php
include_once "connect.php";

if (!empty($_POST["state_id"])) {
    $state_id = $_POST["state_id"];
  
    $query = "SELECT * FROM tbl_district WHERE state_id=$state_id";
  
    $results = mysqli_query($con, $query);
    ?>
    <option >select district</option>
    
    <?php
  
    foreach($results as $state){
      ?>
  
      <option value="<?php echo $state ["district_id"]; ?>"> <?php echo $state["district_name"]; ?></option>
  
       <?php
  }
  }
  ?>