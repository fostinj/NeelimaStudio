<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['userLogin']))
{
	header('location:login.php');
}
else
{
	
	$loginId = $_SESSION['login_id'];

}
?>
<?php
require 'connect.php';
if(isset($_POST['submit']))
{
    $package=$_POST["package_id"];
$cardno=$_POST["card_no"];
$cardname=$_POST["card_name"];
$month = $_POST["month"];
$year=$_POST["year"];
$cvv=$_POST["cvv"];
$bamount=$_POST["amount"];

$ll="select amount from tbl_bank where card_no='$cardno' and card_name='$cardname' and month='$month' and year='$year' and cvv='$cvv'";
    $resultpp=mysqli_query($con,$ll);
    $po=mysqli_fetch_array($resultpp);
    $balance=$po[0];
$sql="select * from tbl_bank where card_no='$cardno' and card_name='$cardname' and month='$month' and year='$year' and cvv='$cvv' ";
$res=mysqli_query($con,$sql);
$no=mysqli_num_rows($res);
if($no==null)
{
	 
    
    echo"<script>alert('Invalid Details.........');
    document.location=('bookedpackage.php');     
        </script>";
		
}

elseif($bamount>$balance)
{
    echo"<script>alert(' Insufficient balance.........');
    document.location=('bookedpackage.php');     
        </script>";
}
else
{
    // $sql1="update tbl_book_package  set status=1 where `v_id` = $v_id";
    // mysqli_query($conn,$sql1);
    $b="select amount from tbl_bank where card_no='$cardno' and card_name='$cardname' and month='$month' and year='$year' and cvv='$cvv'";
    $result=mysqli_query($con,$b);
    $rowm=mysqli_fetch_array($result);
     $pamount=$rowm[0]-$bamount;
     $pay="update tbl_bank  set amount=$pamount where `card_no` = $cardno";
    mysqli_query($con,$pay);


    $c="select amount from tbl_bank where card_no='4545454545454545'";
    $result45=mysqli_query($con,$c);
    $ro=mysqli_fetch_array($result45);
     $aamount=$ro[0]+$bamount;
    $payment="update tbl_bank  set amount=$aamount where `card_no` = 4545454545454545";
    mysqli_query($con,$payment);

     echo"<script>alert('sucessful.........');
 
       document.location=('bookedpackage.php');
       </script>";

	?>
   
    <?php
}
}
?>