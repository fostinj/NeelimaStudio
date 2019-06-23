<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>PHP GURUKUL | DEMO</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
<script>
function getdistrict(val) {
	$.ajax({
	type: "POST",
	url: "get_district.php",
	data:'state_id='+val,
	success: function(data){
		$("#district-list").html(data);
	}
	});
}
</script>
</head>
	<body>


<div class="container-fluid">
  

  <div class="col-sm-8">
    <div class="row">
      <div class="col-xs-12">
        <h3>jQuery Dependent DropDown List – States and Districts </h3>
		<hr >
<form name="insert" action="" method="post">
<table width="100%" height="117"  border="0">
<tr>
<th width="27%" height="63" scope="row">Sate :</th>
<td width="73%"><select onChange="getdistrict(this.value);"  name="state" id="state" class="form-control" >
<option value="">Select</option>
<?php $query =mysqli_query($con,"SELECT * FROM tbl_state");
while($row=mysqli_fetch_array($query))
{ ?>
<option value="<?php echo $row['state_id'];?>"><?php echo $row['state_name'];?></option>
<?php
}
?>
</select></td>
</tr>
<tr>
<th scope="row">District :</th>
<td><select name="district" id="district-list" class="form-control">
<option value="">Select</option>
</select></td>
</tr>
</table>


 </form>
</div>
</div>
        
   
  </div><!--/center-->
</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>