<?php 

   include('../config/constants.php');
 
   if(isset($_GET['id']) AND isset($_GET['image_name'])){

   //	echo "GEt value";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        if($image_name!=""){

        	$path="../images/category/".$image_name;
        	$remove=unlink($path);
              
            if($remove==false){
            	$_SESSION['remove']="failed";
            	die();
            	header('location:'.SITEURL.'admin/category.php');
            }
        }

        $sql="DELETE FROM category WHERE id=$id ";

        $res=mysqli_query($conn, $sql);


        if($res==true){

        	$_SESSION['delete']="Category deleted successfully";
        	header('location:'.SITEURL.'admin/category.php');

        }
        else{

        	$_SESSION['delete']="Category failed";
        	header('location:'.SITEURL.'admin/category.php');

        }

   }
   else{

   	 header('location:'.SITEURL.'admin/category.php');

   }

?>