<?php

//fetch_third_level_category.php

include('database_connection.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT ser.*,sub.* FROM tbl_services ser JOIN tbl_subcategory sub ON sub.subcategory_id=ser.subcategory_id 
 WHERE ser.subcategory_id IN ('".$id."')
 "; 
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["services_id"].'">'.$row["subcategory_name"]." ".$row["services_name"]." Rs.".$row["services_rate"].'</option>';
 }
 echo $output;
}
else
{
    echo "Select services";
}




?>