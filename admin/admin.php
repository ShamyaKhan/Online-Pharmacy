<?php
   include('Menu/menu.php');
?>


            <!-- Main content starts-->
            <div class="content">
            	<div class="wrapper">
            	<h1> Admin Panel </h1> <br> <br>

              <?php 
                 if(isset($_SESSION['add']))
                 {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
                 }

                if(isset($_SESSION['delete'])){
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update'])){
                      echo $_SESSION['update'];
                      unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found'])){
                  echo $_SESSION['user-not-found'];
                  unset($_SESSION['user-not-found']);

                }

                if(isset($_SESSION['pwd-not-match'])){
                  echo $_SESSION['pwd-not-match'];
                  unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['cng-pwd'])){
                  echo $_SESSION['cng-pwd'];
                  unset($_SESSION['cng-pwd']);
                }

              ?> <br> <br>

              <!-- Button to add admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin </a> <br> <br>

                  <table class="tbl-full">
                    <tr>
                        <th>Serial no</th>
                        <th> Full Name </th>
                        <th> User name </th>
                        <th> Actions </th>
                    </tr>


                    <?php 
                      $sql="SELECT * FROM admin";
                      $res=mysqli_query($conn,$sql);
                      if($res==TRUE){
                        $count=mysqli_num_rows($res);
                        $sn=1;

                        if($count>0){
                          while($rows=mysqli_fetch_assoc($res)){
                            $id=$rows['id'];
                            $full_name=$rows['fullname'];
                            $username=$rows['username'];
                            ?>

                            <tr>
                        <td> <?php echo $sn++ ?></td>
                        <td> <?php echo $full_name; ?></td>
                        <td><?php echo $username; ?> </td>
                        <td>
                          <a href="<?php echo SITEURL;?>admin/update-password.php ?id=<?php echo $id?>" class="btn-primary"> Change Password </a>
                          <a href="<?php echo SITEURL;?>admin/update-admin.php ?id=<?php echo $id?>" class="btn-secondary">Update Admin</a>
                            <a href="<?php echo SITEURL;?>admin/delete-admin.php ?id=<?php echo $id?>" class="btn-danger">Delete Admin </a>
                        </td>

                    </tr>
                            <?php

                          }
                        }
                        else{


                          
                        
                      }
                        }
                    ?>


                    
                    

                  </table>
                    


                </div>
            </div>
            <!-- Main content ends -->

<?php
  include('Menu/footer.php');
?>