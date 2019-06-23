<?php
session_start();
include 'connect.php';
if ($_SESSION['userLogin'] == 'active')
{
    $loginId=$_SESSION['login_id'];
    include 'userheader.php';
}
else
{
    header('location:login.php');
}
?>
<?php
if(isset($_POST['submit']))
{
    $product_id=$_POST['product_id'];
}
?>
<h2>suc<h2>