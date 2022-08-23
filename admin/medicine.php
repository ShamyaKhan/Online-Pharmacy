<?php 
include('Menu/menu.php');
?>

  <div class="content">
  	  <div class="wrapper">
 
          <h1> These are the medicines </h1> <br> <br>

           <!-- Button to add medicine -->
                <a href="<?php echo SITEURL;?>admin/add-medicine.php" class="btn-primary">Add medicine </a> <br> <br>

                <?php 
                   if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                   }

                   if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                   }

                   if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                   }

                   if(isset($_SESSION['unauthorized'])){
                    echo $_SESSION['unauthorized'];
                    unset($_SESSION['unauthorized']);
                   }

                   if(isset($_SESSION['update'])){
                      echo $_SESSION['update'];
                      unset($_SESSION['update']);
                   }
                ?>

                  <table class="tbl-full">
                    <tr>
                        <th>Serial no</th>
                        <th> Title </th>
                        <th> Price </th>
                        <th> Image </th>
                        <th> Featured </th>
                        <th> Active </th>
                        <th> Action </th>
                    </tr>

                    <?php
                       $sql="SELECT * FROM medicine ";
                       $res=mysqli_query($conn, $sql);
                       $count=mysqli_num_rows($res);
                       $sn=1;
                       if($count>0){

                        while($row=mysqli_fetch_assoc($res)){
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];

                            ?>
                                <tr>
                                   <td> <?php echo $sn++; ?></td>
                                   <td><?php echo $title;?></td>
                                   <td><?php echo $price;?> </td>
                                    <td>
                                        <?php
                                          if($image_name==""){
                                            echo "Error";
                                          }
                                          else{
                                            ?>
                                              <img src="<?php echo SITEURL;?>images/medicines/<?php echo $image_name;?>" width="100px">
                                            <?php 
                                          }
                                        ?> 
                                    </td>
                                   <td> <?php echo $featured;?> </td>                                   
                                   <td> <?php echo $active;?></td>
                                   <td> 
                                    <a href="<?php echo SITEURL;?>admin/update-medicine.php?id=<?php echo $id;?>" class="btn-secondary">Update Medicine</a>
                                   <a href="<?php echo SITEURL;?>admin/delete-medicine.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Medicine </a>
                                  </td>

                                </tr>

                            <?php
                        }

                       }
                       else{
                        echo "<tr> <td colspan='7'> Medicine not added </td></tr>";
                       }

                    ?>
                    

                   
                    

                  </table>

  	  </div>

  </div>

<?php 
 include('Menu/footer.php');
?>