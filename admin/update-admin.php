<?php 
   include('Menu/menu.php');
?>

   <div class="content">
         <div class="wrapper">
         	 <h1> Update Admin </h1> <br> <br>

         	 <?php 
         	 $id=$_GET['id'];
         	 $sql="SELECT * FROM admin WHERE id=$id";
         	 $res= mysqli_query($conn, $sql);

         	 if($res==true){
         	 	$count=mysqli_num_rows($res);
         	 	  if($count==1){
                    //echo "admin available";
                    $row=mysqli_fetch_assoc($res);
                    $full_name=$row['fullname'];
                    $username=$row['username'];
         	 	  }
         	 	  else{
                    header('location:'.SITEURL.'admin/admin.php');
         	 	  }
         	 }

         	 ?>

         	   <form action="" method="POST">

                   <table class="tbl-30">
                   	 <tr>
                   	 	 <td> Full name </td>
                   	 	 <td> <input type="text" name="full_name" value="<?php echo $full_name;?>"> </td>
                   	 </tr>

                   	 <tr>
                   	 	<td> User Name </td>
                   	 	<td> <input type="text" name="username" value="<?php echo $username;?>"></td>
                   	 </tr>
                   	<tr>
                   		<td colspan="2">
                   			<input type="hidden" name="id" value="<?php echo $id;?>">
                             <input type="submit" name="submit" value="update-admin" class="btn-secondary">
                   		 </td>
                   	</tr>

                   </table>

         	   </form>



         </div>

   	</div>


   	  <?php

   	  if(isset($_POST['submit'])){
               // echo "submitted";

   	  	     $id=$_POST['id'];
   	  	     $full_name=$_POST['full_name'];
   	  	     $username=$_POST['username'];


   	  	     $sql="UPDATE admin SET fullname='$full_name', username='$username' WHERE id='$id' ";

   	  	     $res=mysqli_query($conn, $sql);

   	  	     if($res==true){
   	  	     	$_SESSION['update']= "Admin updated";
   	  	     	header('location:'.SITEURL.'admin/admin.php');

   	  	     }
   	  	     else{
   	  	     	$_SESSION['update']= "failed";
   	  	     	header('location:'.SITEURL.'admin/admin.php');

   	  	     }
   	  } 

   	  ?>



   	<?php 
       include('Menu/footer.php');
   ?>