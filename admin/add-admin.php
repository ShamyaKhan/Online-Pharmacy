<?php
include('Menu/menu.php'); 
?>

  <div class="content">

  	 <div class="wrapper">

  	 	<h1> Add Admin </h1>

           <?php 
             if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
             }
           ?>
         <form action="" method="POST">
            
            <table class="tbl-30">
               <tr>
                 <td> Full Name </td>
                 <td> <input type="text" name="full_name" placeholder="Enter your name"> </td>   
               </tr>

               <tr>
                  <td> Username</td>
                  <td> <input type="text" name="username" placeholder="Enter your username"> </td> 
               </tr>
               <tr>
                 <td> Password</td>
                 <td> <input type="Password" name="password" placeholder="Enter your Password"></td> 
               </tr>
               <tr> 
               	  <td colspan="2"> 
               	  	<input type="submit" name="submit" value="Add-Admin" class="btn-secondary">
               	  </td>
               </tr>
            </table>

         </form>

  	 </div>
      
  </div>

<?php
include('Menu/footer.php'); 

if(isset($_POST['submit']))
{
	//echo "Submitted";

    // Get data from the form

	$full_name=$_POST['full_name'];

	$username=$_POST['username'];
	$password=($_POST['password']);

    // SQL query to save data into database

    $sql="INSERT INTO admin SET fullname='$full_name', username='$username', password='$password'";
      

      // execute query and save in database

      $res=mysqli_query($conn, $sql) or die(mysqli_error());


      //check 

      if($res==TRUE){
       //echo "Data inserted";
        $_SESSION['add']="Admin added successfully";
        header("location:".SITEURL.'admin/admin.php');

      }
      
      else{
        //echo  "failed";

         $_SESSION['add']="failed to add admin successfully";
        header("location:".SITEURL.'admin/add-admin.php');
      }


}



?>