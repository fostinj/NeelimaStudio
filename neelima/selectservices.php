<?php
session_start();

include 'connect.php';
if ($_SESSION['userLogin'] != 'active')
{
    header('location:index.php');
}
else
{
    include 'userheader.php';
    $loginid=$_SESSION['login_id'];
    $name = $_SESSION['name'];
    $mobile = $_SESSION['mobile'];
    $image = $_SESSION['image'];
    
}



?>
<?php


include('database_connection.php');

$query = "
SELECT * FROM tbl_category 
ORDER BY category_name ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  <style type="text/css">
    .multiselect-container {
        width: 100% !important;
    }
</style>
 </head>
 <body>
<!--================Home Banner Area =================-->
            <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Customize Package</h2>
						<div class="page_link">
							<a href="">Home</a>
							<a href="selectservices.php">Customize Package</a>
						</div>
					</div>
				</div>
            </div>
        </section>
<!--================End Home Banner Area =================-->
  <section class="home_gallery_area p_120">
          <div class="container">
  <div class="container">
  <form name="add_name" id="add_name">
  
   <br /><br />

        <div class="form-group">
            <label>Category</label><br />
            <select id="category" name="category_id[]" multiple class="form-control" required>
            <?php
            foreach($result as $row)
            {
            echo '<option value="'.$row["category_id"].'">'.$row["category_name"].'</option>';
            }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label>Subcategory</label><br />
            <select id="subcategory" name="subcategory_id[]" multiple class="form-control" required>

            </select>
        </div>
        <div class="form-group">
            <label>Services</label><br />
            <select id="services" name="services_id[]" multiple class="form-control" required>
            </select>
        </div>
    
             <div class="form-group">
        
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field" style="width: 80%;">
              <tr>
                <td style="width: 90%"><input type="date" name="date[]" min="<?php echo date('Y-m-d');?>" placeholder="Enter your Date" class="form-control name_list" required/></td>
                <tr>
                <td><input type="text" name="location[]"  placeholder="Enter function Location" class="form-control name_list" required/></td>


                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
              </tr>
                            
            
            </table>
            <input type="hidden" name="login_id" value="<?php echo $loginid ?>"/>
            <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />

          </div>
        
      </div>
    </div>
            
            <div class="price-container" style="width: 100px;display: inline-block; margin: 100px auto; float: left">
                    <span id="price" style="font-size: 1.8vw;font-weight: bold">&#x20b9; 0</span>
                </div>


            </form>
        </div>
  </div>    
  </section>
 </body>
</html>
<!--------MULTISELECT VALIDATION------------>
<script>
$(function(){
    $('#add_name').submit(function(){
         var options = $('#services > option:selected');
         if(options.length == 0){
             alert('no value selected');
             return false;
         }
    });
});
</script>

<script type="text/javascript">
        $(document).ready(function() {
        $.validator.addMethod("needsSelection", function (value, element) {
            var count = $(element).find('option:selected').length;
            return count > 0;
          });

        $.validator.messages.needsSelection = 'Select Atleast One Service'; 

          $("#add_name").validate({
                  rules: {    
                    'services[]': {
                    needsSelection: true
                    }
                  },
              }
          });

 $("#submit").click(function(e) {
    var isvalidate=$("#add_name").valid();
    if(isvalidate=="true")
    {

    }
    else
    {
        $("#add_name").submit();
    }
 });

});

  </script>
<script>
$(document).ready(function(){

 $('#category').multiselect({
  nonSelectedText:'Select Category',
  buttonWidth:'400px',
  onChange:function(option, checked){
   $('#subcategory').html('');
   $('#subcategory').multiselect('rebuild');
   $('#services').html('');
   $('#services').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_subcategory.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {         
      $('#subcategory').html(data);
      $('#subcategory').multiselect('rebuild');
     }
    })
   }
  }
 });

 $('#subcategory').multiselect({
  nonSelectedText: 'Select Subcategory',
  buttonWidth:'400px',
  onChange:function(option, checked)
  {
   $('#services').html('');
   $('#services').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_services.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#services').html(data);
      $('#services').multiselect('rebuild');
     }
    });
   }
  }
 });

 $('#services').multiselect({
  nonSelectedText: 'Select Services',
  buttonWidth:'400px',
  onChange:function(option, checked)
  {
   $('#price').html('&#x20b9; 0');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $('#price').html('&#x20b9;');
   }
  }
 });

});
</script>
<script>
$(document).ready(function(){
  var i=1;
  $('#add').click(function(){
    i++;
    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="date" name="date[]" min="<?php echo date('Y-m-d');?>" placeholder="Enter your Date" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>').append('<tr id="row'+i+'"><td><input type="text" name="location[]"  placeholder="Enter function Location" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    
  
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  
  $('#submit').click(function(){    
    $.ajax({
      url:"name.php",
      method:"POST",
      data:$('#add_name').serialize(),
      success:function(data)
      {
        alert(data);
        $('#add_name')[0].reset();
      }
    });
  });
  
});

</script>
<!--================Footer Area =================-->
<footer class="footer_area p_120">
          <div class="container">
            <div class="row footer_inner">
              <div class="col-lg-5 col-sm-6">
                <aside class="f_widget ab_widget">
                  <div class="f_title">
                    <h3>About Us</h3>
                  </div>
                  <p>Photography Studio in Kerala.</p>
                  <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Neelima Studio</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </aside>
              </div>
              <div class="col-lg-5 col-sm-6">
                <aside class="f_widget news_widget">
                  <div class="f_title">
                    <h3>Newsletter</h3>
                  </div>
                  <p>Stay updated with our latest trends</p>
                  <div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                  <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>    
                                    </div>        
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                </aside>
              </div>
              <div class="col-lg-2">
                <aside class="f_widget social_widget">
                  <div class="f_title">
                    <h3>Follow Me</h3>
                  </div>
                  <p>Let us be social</p>
                  <ul class="list">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                  </ul>
                </aside>
              </div>
            </div>
          </div>
        </footer>
        <!--================End Footer Area =================-->

