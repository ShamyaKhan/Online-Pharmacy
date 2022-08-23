<?php 

    include ('../config/constants.php');
   
    $id=$_GET['id'];

    $sql="DELETE FROM admin WHERE id=$id";

    $res=mysqli_query($conn, $sql);

    if($res==TRUE){
        //echo "Admin deleted";

        $_SESSION['delete']="Admin deleted successfully";
        header('location:'.SITEURL.'admin/admin.php');
    }
    else{
       //echo "failed";

    $_SESSION['delete']="Failed to delete admin";
     header('location:'.SITEURL.'admin/admin.php');
    }

?>