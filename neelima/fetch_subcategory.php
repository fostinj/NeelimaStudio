<?php

//fetch_second_level_category.php

include('database_connection.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT sub.*,cat.* FROM tbl_subcategory sub JOIN tbl_category cat ON cat.category_id=sub.category_id 
 WHERE sub.category_id IN ('".$id."')
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["subcategory_id"].'">'.$row["category_name"]." ".$row["subcategory_name"].'</option>';
 }
 echo $output;
}

?>