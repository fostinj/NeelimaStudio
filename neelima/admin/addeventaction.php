<?php
	require "connect.php";
	if(isset($_POST["submit"]))
	{
		$event=$_POST['event'];
		$sql="insert into tbl_calander (event,date,status) values ('$event''$allDay','1')";
	}
?>
?>