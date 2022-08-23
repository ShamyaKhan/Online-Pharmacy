<?php 
  
    include('../config/constants.php');


   if(isset($_GET['id']) AND isset($_GET['image_name'])){
         //echo "success";

   	    $id=$_GET['id'];
   	    $image_name=$_GET['image_name'];

   	    if($image_name!=""){

   	    	$path="../images/medicines/".$image_name;
   	    	$remove=unlink($path);

   	    	if($remove==false){
   	    		$_SESSION['upload']="Failed to delete image";
   	    		header('location:'.SITEURL.'admin/medicine.php');
   	    		die();
   	    	}
   	    }

   	     $sql="DELETE FROM medicine WHERE id=$id";
   	     $res=mysqli_query($conn, $sql);
   	      
   	     if($res==true){
   	     	
   	     	  $_SESSION['delete']="Succcessfully deleted";
              header('location:'.SITEURL.'admin/medicine.php');
          }

   	     else{
   	     	  $_SESSION['delete']="Failed to delete";
              header('location:'.SITEURL.'admin/medicine.php');
             
   	     }
   	 }
         
   else{
   	
        $_SESSION['unauthorized']="Unauthorized access";
    	header('location:'.SITEURL.'admin/medicine.php');
   }
?>