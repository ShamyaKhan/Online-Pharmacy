<?php 
  include('Menu/menu.php');
?>


    <div class="content">

    	<div class="wrapper">

    		<h1> Change Password</h1> <br> <br>

    		<?php 
    		if(isset($_GET['id'])){
               $id=$_GET['id'];
    		}
    		?>

    		 <form action="" method="POST">

    		 	<table class="tbl-30">
    		 		<tr>
    		 			<td> Current Password </td>
    		 			<td>
    		 				<input type="Password" name="current_password" placeholder="Current Password">
    		 			</td>
    		 		</tr>

    		 		<tr>
    		 			<td> New Password </td>
    		 			<td> 
    		 				<input type="Password" name="new_password" placeholder="New Password">
    		 			</td>
    		 		</tr>

    		 		<tr>
    		 			<td> Confirm Password </td>
    		 			<td>
    		 				<input type="Password" name="confirm_password" placeholder="Confirm Password">
    		 			</td>
    		 		</tr>
    		 		<tr>
    		 			<td colspan="2">
    		 				<input type="hidden" name="id" value="<?php echo $id; ?>">
    		 				<input type="submit" name="submit" value="Change Password" class="btn-secondary">
    		 			</td>
    		 		</tr>
    		 	</table/>

    		 </form>
    	</div>
    </div>


    <?php 
           if(isset($_POST['submit'])){
           	//echo "submitted";

           	$id=$_POST['id'];
           	$current_password=$_POST['current_password'];
           	$new_password=$_POST['new_password'];
           	$confirm_password=$_POST['confirm_password'];

            $sql="SELECT * FROM admin WHERE id=$id AND password='$current_password' ";

            $res=mysqli_query($conn, $sql);

            if($res==true){
            	$count=mysqli_num_rows($res);

            	if($count==1){
                   //echo "found";

                  if($new_password==$confirm_password){
                    // echo "password";

                      $sql2="UPDATE admin SET password='$new_password' WHERE id=$id";

                      $res2=mysqli_query($conn, $sql2);

                       if($res2==true){
                            $_SESSION['cng-pwd']="Password changed";
                     header("location:".SITEURL.'admin/admin.php');
                             
                       }
                       else{
                            $_SESSION['user-not-found']="Failed to change password";
                     header("location:".SITEURL.'admin/admin.php');
                       }
                  }
                  else{
                     $_SESSION['pwd-not-match']="Password didn't match";
                     header("location:".SITEURL.'admin/admin.php');

                  }
            	}
            	else{
            		$_SESSION['user-not-found']="User Not Found";
            		header("location:".SITEURL.'admin/admin.php');
            	}
            }


           }
    ?>



<?php 

include('Menu/footer.php');
?>