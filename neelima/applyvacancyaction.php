<?php
include 'connect.php';
session_start();
$id = $_SESSION['login_id'];

if(isset($_POST['apply']))
{
    $proof = $_FILES['experience_proof']['name'];
    move_uploaded_file($_FILES['experience_proof']['tmp_name'],"files/experience/".$proof);
    $vacancy_id = $_POST['vacancy_id'];
    $logid = $id;

    $sql2="select * from `tbl_jobapplicants` where login_id='$logid' AND vacancy_id='$vacancy_id'";
	$result2=mysqli_query($con,$sql2)or die(mysql_error());
	$arr=mysqli_fetch_array($result2);
	if(mysqli_num_rows($result2) > 0)
	{
        echo"<script>alert('Job request already send..!!')</script>";
        echo "<script type='text/javascript'>window.location.href = 'jobvacancy.php'</script>";
	}
    else
        {
        $sql="INSERT INTO tbl_jobapplicants (`login_id`,`vacancy_id`,`experience_proof`,`status`) VALUES ('$logid','$vacancy_id','$proof','1')";
        $result=mysqli_query($con,$sql);
        if($result)
            {
            echo"<script>alert('Thank You for applying..!!')</script>";
            echo "<script type='text/javascript'>window.location.href = 'jobvacancy.php'</script>";
            }
        else
            {
            echo"<script>alert('Request failed do to some error..!!')</script>";
            echo "<script type='text/javascript'>window.location.href = 'applyvacancy.php'</script>";
            }
    }
}

?>
<?php
