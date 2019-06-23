<?php
session_start();
if ($_SESSION['userLogin'] == 'active')
{
    $loginId=$_SESSION['login_id'];
}
?>

<?php
require_once ('connect.php');
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
// $loginId = 17;

if (isset($_POST["index"], $_POST["package_id"])) {
    
    $packageId = $_POST["package_id"];
    $rating = $_POST["index"];
    
    $checkIfExistQuery = "select * from tbl_rating where login_id = '" . $loginId . "' and package_id = '" . $packageId . "'";
    if ($result = mysqli_query($con, $checkIfExistQuery)) {
        $rowcount = mysqli_num_rows($result);
    }
    
    if ($rowcount == 0) {
        $insertQuery = "INSERT INTO tbl_rating(package_id,login_id,rating) VALUES ('" . $packageId . "','" . $loginId . "','" . $rating . "') ";
        $result = mysqli_query($con, $insertQuery);
        echo "Rating Added";
    } else {
        echo "Already Rated!";
    }
}
