<?php
session_start();
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
$packageId = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>
<style>
/* body {
    width: 550px;
    font-family: arial;
} */

/* ul {
    margin: 0px;
    padding: 10px 0px 0px 0px;
} */

li.star {
    list-style: none;
    display: inline-block;
    margin-right: 5px;
    cursor: pointer;
    color: #9E9E9E;
}

li.star.selected {
    color: #ff6e00;
}

/* .row-title {
    font-size: 20px;
    color: #00BCD4;
} */

.review-note {
    font-size: 12px;
    color: #999;
    font-style: italic;
}
/* .row-item {
    margin-bottom: 20px;
    border-bottom: #F0F0F0 1px solid;
} */
p.text-address {
    font-size: 12px;
}
</style>
</head>
<section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2>Rating</h2>
						<div class="page_link">
							<a href="userhome.php">Home</a>
							<a href="">Rating</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        
<body onload="showPackageData('getRatingData.php?id=<?php echo $packageId ?>')">


    <div class="container">

        <span id="package_list"></span>
        <input type="button" name="" onclick="window.location.href = 'package.php';" value="Back" class="genric-btn danger-border circle">

    </div>


<script type="text/javascript">

    function showPackageData(url)
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("package_list").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();

    } 

    function mouseOverRating(packageId, rating) {

        resetRatingStars(packageId)

        for (var i = 1; i <= rating; i++)
        {
            var ratingId = packageId + "_" + i;
            document.getElementById(ratingId).style.color = "#ff6e00";

        }
    }

    function resetRatingStars(packageId)
    {
        for (var i = 1; i <= 5; i++)
        {
            var ratingId = packageId + "_" + i;
            document.getElementById(ratingId).style.color = "#9E9E9E";
        }
    }

   function mouseOutRating(packageId, userRating) {
	   var ratingId;
       if(userRating !=0) {
    	       for (var i = 1; i <= userRating; i++) {
    	    	      ratingId = packageId + "_" + i;
    	          document.getElementById(ratingId).style.color = "#ff6e00";
    	       }
       }
       if(userRating <= 5) {
    	       for (var i = (userRating+1); i <= 5; i++) {
	    	      ratingId = packageId + "_" + i;
	          document.getElementById(ratingId).style.color = "#9E9E9E";
	       }
       }
    }

    function addRating (packageId, ratingValue) {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function ()
            {
                if (this.readyState == 4 && this.status == 200) {

                    showPackageData('getRatingData.php?id=<?php echo $packageId ?>');
                    
                    if(this.responseText != "success") {
                    	   alert(this.responseText);
                    }
                }
            };

            xhttp.open("POST", "insertRating.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var parameters = "index=" + ratingValue + "&package_id=" + packageId;
            xhttp.send(parameters);
    }
</script>

<?php
include 'footer.php';
?>