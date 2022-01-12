<?php session_start();?>
<?php
   $hostName="localhost";
   $userName="root";
   $pass="";
   $db ="doctor_database";
 
 $con = mysqli_connect($hostName,$userName,$pass);
 
 mysqli_select_db($con,$db);
 
 ?>

<?php
//    $hostName="localhost";
//    $userName="qbgdzmne_doctor_database";
//    $pass="mLmuwBUBEGQe";
//    $db ="qbgdzmne_doctor_database";
 
//  $con = mysqli_connect($hostName,$userName,$pass);
 
//  mysqli_select_db($con,$db);
 
 ?>