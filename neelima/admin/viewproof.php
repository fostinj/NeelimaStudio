
<?php
include 'connect.php';
$query = "SELECT experience_proof FROM tbl_jobapplicants where applicants_id =".$_GET['id'];
$result = MYSQLI_QUERY($con,$query);
while($row=mysqli_fetch_row($result))
{
    $proof=$row['experience_proof'];
    ?>
<?php
}
?>
<?php
// The location of the PDF file on the server.
$filename = "/files/experience/".$proof;

// Let the browser know that a PDF file is coming.
header("Content-type: application/pdf");
header("Content-Length: " . filesize($filename));

// Send the file to the browser.
readfile($filename);
exit;
?>
