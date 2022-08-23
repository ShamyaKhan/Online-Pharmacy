<?php 

   session_start();

   define('SITEURL','http://localhost/Online Pharmacy/');
   define('LOCALHOST','localhost');
   define('DB_USERNAME','root');
   define('DB_PASSWORD','');
   define('DB_NAME','pharmacy');


$conn= mysqli_connect('LOCALHOST','root', '') or die(mysqli_error());
      $db_select=mysqli_select_db($conn, 'pharmacy') or die(mysqli_error());


?>