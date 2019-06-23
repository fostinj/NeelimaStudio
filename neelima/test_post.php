<?php
include 'connect.php';
?>
<html>  
<body>  

   <form action="" method="post" enctype="multipart/form-data">  
   <div style="width:200px;border-radius:6px;margin:0px auto">  
<table border="1">  
   <tr>  
      <td colspan="2">Select Technolgy:</td>  
   </tr>  
   <?php
$sql="SELECT * FROM tbl_services WHERE `status`='1'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result))
{
?>
   <tr>  
      <td><?php echo $row['services_name']?></td>  
      <td><input type="checkbox" name="services[]" value="<?php echo $row['services_id']?>"></td>  
   </tr>  
   <?php
}
?>
   <tr>  
      <td colspan="2" align="center"><input type="submit" value="submit" name="sub"></td>  
   </tr>  
   
</table>  
</div>  
</form>  

<?php  
if(isset($_POST['sub']))  
{  
$host="localhost";//host name  
$username="root"; //database username  
$word="";//database word  
$db_name="mainproject";//database name  
$tbl_name="tbl_service"; //table name  
$con=mysqli_connect("$host", "$username", "$word","$db_name")or die("cannot connect");//connection string  
$checkbox1=$_POST['services'];  
$chk="";  
foreach($checkbox1 as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
$in_ch=mysqli_query($con,"insert into tbl_package(package_services) values ('$chk')");  
if($in_ch==1)  
   {  
      echo'<script>alert("Inserted Successfully")</script>';  
   }  
else  
   {  
      echo'<script>alert("Failed To Insert")</script>';  
   }  
}  
?>  
</body>  
</html>