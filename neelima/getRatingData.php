<?php
session_start();
if ($_SESSION['userLogin'] == 'active')
{
    $loginId=$_SESSION['login_id'];
}
?>
<?php
require_once "connect.php";
require_once "functions.php";
// Here the user id is harcoded.
// You can integrate your authentication code here to get the logged in user id
// $loginId = 17;

$query = "SELECT * FROM tbl_package WHERE `status`='1' AND package_id=".$_GET['id'];
$result = mysqli_query($con, $query);

$outputString = '';

foreach ($result as $row) {
    $userRating = userRating($loginId, $row['package_id'], $con);
    $totalRating = totalRating($row['package_id'], $con);
    $outputString .= '
    <div class="row-item">
    <div class="row-title"><h2>' . $row['package_name'] . ' Package</h2></div> <div class="response" id="response-' . $row['package_id'] . '"></div>
    <ul class="list-inline"  onMouseLeave="mouseOutRating(' . $row['package_id'] . ',' . $userRating . ');"> ';
    
    for ($count = 1; $count <= 5; $count ++) {
        $starRatingId = $row['package_id'] . '_' . $count;
        
        if ($count <= $userRating) {
            
            $outputString .= '<li value="' . $count . '" id="' . $starRatingId . '" class="star selected">&#9733;</li>';
        } else {
            $outputString .= '<li value="' . $count . '"  id="' . $starRatingId . '" class="star" onclick="addRating(' . $row['package_id'] . ',' . $count . ');" onMouseOver="mouseOverRating(' . $row['package_id'] . ',' . $count . ');">&#9733;</li>';
        }
    } // endFor
    
    $outputString .= '
 </ul>
 
 <p class="review-note"><h4>Total Reviews: ' . $totalRating . '</h4></p>
</div>
 ';
}
echo $outputString;
?>