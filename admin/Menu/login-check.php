<?php 

if(!isset($_SESSION['user'])){

	$_SESSION['no-login-message']="<div class='text-center'>Please log in first</div>";

	header('location:'.SITEURL.'admin/login.php');

}

?>