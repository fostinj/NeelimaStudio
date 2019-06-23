<?php
$connect = mysqli_connect("localhost", "root", "", "mainproject");
$category = count($_POST["category_id"]);
$subcategory = count($_POST["subcategory_id"]);
$services = count($_POST["services_id"]);
$number1 = count($_POST["date"]);
$number2 = count($_POST["location"]);
$loginid=$_POST['login_id'];




if($category > 0 && $subcategory > 0 && $services > 0 && $number1 > 0 && $number2 > 0)
{
	for($j=0; $j<$category; $j++)
		{
            for($k=0; $k<$subcategory; $k++)
            {

                for($l=0; $l<$services; $l++)
                {
		for($i=0; $i<$number1; $i++)
		{
			for($i=0; $i<$number2; $i++)
			{
				
		if(trim($_POST["category_id"][$j] != '') && trim($_POST["subcategory_id"][$k] != '') && trim($_POST["services_id"][$l] != '') && trim($_POST["date"][$i] != '') && trim($_POST["location"][$i] != ''))
		{
			$sql = "INSERT INTO tbl_servicesbooking(login_id,category_id,subcategory_id,services_id,date,location,status) VALUES('$loginid','".mysqli_real_escape_string($connect, $_POST["category_id"][$j])."','".mysqli_real_escape_string($connect, $_POST["subcategory_id"][$k])."','".mysqli_real_escape_string($connect, $_POST["services_id"][$l])."','".mysqli_real_escape_string($connect, $_POST["date"][$i])."','".mysqli_real_escape_string($connect, $_POST["location"][$i])."','1')";
			mysqli_query($connect, $sql);
			
		}
    }
}
                }
            }


}
	echo "Services Added";
}
else
{
	echo "Please Select Services";
}
?>