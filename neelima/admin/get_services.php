<?php
require_once("connect.php");
if(!empty($_POST["subcategory_id"])) 
{
$query =mysqli_query($con,"SELECT * FROM tbl_services WHERE subcategory_id = '" . $_POST["subcategory_id"] . "'");
?>
<option value="">Select Services</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row['services_id']; ?>"><?php echo $row["services_name"]; ?></option>
<?php
}
}
?>
