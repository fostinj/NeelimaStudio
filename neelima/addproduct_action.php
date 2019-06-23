<?php
include 'connect.php';
	if(isset($_POST["submit"]))
	{
		$type=$_POST['producttype_id'];
        $name=$_POST['product_name'];
        $description=$_POST["product_description"];
        $rate=$_POST["product_rate"];
    // $code=$_POST['product_code'];
		$image = $_FILES['product_image']['name'];
    	move_uploaded_file($_FILES['product_image']['tmp_name'],"img/uploads/products/".$image);
        
        
     
          $sql="INSERT INTO `tbl_products`(`producttype_id`, `product_name`, `product_description`, `product_rate`, `product_image`, `status`) VALUES ('$type','$name','$description','$rate','$image','1')";
     
          $result=mysqli_query($con,$sql);
          if($result)
          {
          echo"<script>alert('Product Added Successfully');</script>";
          echo "<script type='text/javascript'>window.location.href = 'addproduct.php'</script>";
          }
          else
          {
          echo"<script>alert('Unsuccessfull');</script>";
          echo "<script type='text/javascript'>window.location.href = 'addproduct.php'</script>";
          }
        }
      
    
?>