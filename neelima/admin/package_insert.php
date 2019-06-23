<?php
$connect = mysqli_connect("localhost", "root", "", "mainproject");
$category=$_POST['category_id'];
        $type=$_POST["type_id"];
        $pname=$_POST["package_name"];
        $album=$_POST["album_output"];
        $video=$_POST["video_output"];
        $rate=$_POST["package_rate"];

        $pdetails=$_POST["package_details"];
        $paydetails=$_POST["payment_details"];
$number = count($_POST["event"]);
$number1 = count($_POST["photography"]);
$number2 = count($_POST["videography"]);
$number3 = count($_POST["services"]);

if($number > 1 && $number1 > 1 && $number2 > 1 && $number3 > 1)
{
    
    for($i=0; $i<$number1; $i++)
		{
    for($i=0; $i<$number1; $i++)
		{
	
		for($i=0; $i<$number1; $i++)
		{
			for($i=0; $i<$number2; $i++)
			{
				
		if(trim($_POST["event"][$i] != '') && trim($_POST["photography"][$i] != '') && trim($_POST["videography"][$i] != '') && trim($_POST["services"][$i] != ''))
		{
			$sql = "INSERT INTO tbl_package(package_name,category_id,type_id,event,photography,videography,services,album_output,video_output,package_rate,package_details,payment_details,image,status) VALUES('".mysqli_real_escape_string($connect, $_POST["package_name"][$i])."','".mysqli_real_escape_string($connect, $_POST["category_id"][$i])."','".mysqli_real_escape_string($connect, $_POST["type_id"][$i])."','".mysqli_real_escape_string($connect, $_POST["event"][$i])."','".mysqli_real_escape_string($connect, $_POST["photography"][$i])."','".mysqli_real_escape_string($connect, $_POST["videography"][$i])."','".mysqli_real_escape_string($connect, $_POST["services"][$i])."','".mysqli_real_escape_string($connect, $_POST["album_output"][$i])."','".mysqli_real_escape_string($connect, $_POST["video_output"][$i])."','".mysqli_real_escape_string($connect, $_POST["package_rate"][$i])."','".mysqli_real_escape_string($connect, $_POST["package_details"][$i])."','".mysqli_real_escape_string($connect, $_POST["payment_details"][$i])."','".mysqli_real_escape_string($connect, $_FILES['image']['name'][$i])."','1')";
			mysqli_query($connect, $sql);
			
		}
	}
        }
    }

                                        

}
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}
