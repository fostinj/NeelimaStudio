<?php
$con=mysqli_connect("localhost","root","","mainproject") or die("error");
/* Attempt to connect to MySQL database */
$link = mysqli_connect("localhost", "root", "", "mainproject");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>