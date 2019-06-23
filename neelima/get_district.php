<?php
require_once("connect.php");
if(!empty($_POST["state_id"])) 
{
$query =mysqli_query($con,"SELECT * FROM tbl_district WHERE state_id = '" . $_POST["state_id"] . "'");
?>
<option value="">Select District</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["district_id"]; ?>"><?php echo $row["district_name"]; ?></option>
<?php
}
}
?>
