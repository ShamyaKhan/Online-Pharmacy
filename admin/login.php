<?php include('../config/constants.php'); ?>

<html>

  <head>
    <title> Login </title>
    <link rel="stylesheet" href="../css/admin.css">

  </head>
     <body>
        <div class="login">
        	<h1 class="text-center"> Login </h1> <br> <br>

          <?php
            if(isset($_SESSION['login'])){
              echo $_SESSION['login'];
              unset($_SESSION['login']);
            } 

            if(isset($_SESSION['no-login-message'])){
              echo $_SESSION['no-login-message'];
              unset($_SESSION['no-login-message']);

            }
          ?>
          <br> <br>

          <form action="" method="POST" class="text-center">
             Username  <br>  <br>       
             <input type="text" name="username" placeholder="Enter username"> <br> <br>
             Password: <br> <br>
             <input type="Password" name="password" placeholder="Enter Password"> <br> <br>

             <input type="submit" name="submit" value="Login" class="btn-primary"> <br> <br>
          </form>

        	<p class="text-center">  Smart Online Pharmacy </p>
           

        </div>
     </body>

</html>

<?php
  if(isset($_POST['submit'])){

     $username=$_POST['username'];
     $password=$_POST['password'];

     $sql="SELECT * FROM admin WHERE username='$username' AND password='$password' ";

     $res=mysqli_query($conn, $sql);

     $count=mysqli_num_rows($res);

     if($count==1){

      $_SESSION['login']="Login successful";
      $_SESSION['user']=$username;
      header('location:'.SITEURL.'admin/');
        
     }
     else{

      $_SESSION['login']="<div class='text-center'>Login failed</div>";
      header('location:'.SITEURL.'admin/login.php');

     }
  } 
?>