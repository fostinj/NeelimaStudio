<?php
require_once("connect.php");
if(!empty($_POST["category_id"])) 
{
$query =mysqli_query($con,"SELECT * FROM tbl_subcategory WHERE category_id = '" . $_POST["category_id"] . "'");
?>
<option value="">Select Subcategory</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row['subcategory_id']; ?>"><?php echo $row["subcategory_name"]; ?></option>
<?php
}
}
?>
