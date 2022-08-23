<?php
  include('Menu/menu.php');
?>

  <div class="content">
  	<div class="wrapper">
  	 <h1> Update Category </h1> <br> <br>


     <?php
        if(isset($_GET['id'])){
          //echo "data got";

          $id=$_GET['id'];
          $sql="SELECT * FROM category WHERE id=$id ";
          $res=mysqli_query($conn,$sql);
          $count=mysqli_num_rows($res);

          if($count==1){

            $row=mysqli_fetch_assoc($res);

            $title=$row['title'];
            $current_image=$row['imagename'];
            $featured=$row['featured'];
            $active=$row['active'];

          }
          else{
            $_SESSION['no-ctg-found']="No category found";
            header('location:'.SITEURL.'admin/category.php');
          }

        }
        else{
          header('location:'.SITEURL.'admin/category.php');
        }

     ?>




  	   <form action="" method="POST" enctype="multipart/form-data"> 

          <table class="tbl-30">

            <tr>
              <td> Title </td>
              <td>
                <input type="text" name="image" value="<?php echo $title;?>">
              </td>
            </tr>

            <tr>
              <td> Current Image </td>
              <td>
                 <?php 
                   if($current_image !=""){

                    ?>
                    <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>" width="100px">

                    <?php

                   }
                   else{
                      echo "error";
                   }

                 ?>
              </td>
            </tr>

            <tr>
              <td> New Image </td>
              <td>
                <input type="file" name="image">
              </td>
            </tr>

            <tr>
              <td> Featured </td>
              <td>
                <input <?php if($featured=="Yes"){echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                <input <?php if($featured=="No"){echo "checked";}?>type="radio" name="featured" value="No"> No
              </td>
            </tr>

            <tr>
              <td> Active </td>
              <td>
                <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                <input <?php if($active=="No"){echo "checked";}?>type="radio" name="active" value="No"> No
              </td>
            </tr>

            <tr>
              <td>
                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" value="update-category" class="btn-secondary">
              </td>
            </tr>

          </table> 

  		  

  	   </form>


       <?php 
          if(isset($_POST['submit'])){
            //echo "clicked";

            $id=$_POST['id'];
            $title=$_POST['title'];
            $current_image=$_POST['current_image'];
            $featured=$_POST['featured'];
            $active=$_POST['active'];

            if(isset($_FILES['image']['name'])){

              $image_name=$_FILES['image']['name'];

              if($image_name !=""){

                $ext=end(explode('.', $image_name));

                    $image_name="pic".rand(000,999).'.'.$ext;

                    $source_path=$_FILES['image']['tmp_name'];
                    $destination_path="../images/category/".$image_name;

                    $upload=move_uploaded_file($source_path, $destination_path);

                    if($upload==false){
                      $_SESSION['upload']="Failed to upload image";
                      header('location:'.SITEURL.'admin/add-category.php');
                      die();
                    }

                    if($current_image!=""){

                      $remove_path="../images/category/".$current_image;
                    $remove=unlink($remove_path);

                    if($remove==false){
                      $_SESSION['fail-remove']="error";
                      header('location:'.SITEURL.'admin/category.php');
                      die();
                    }

                    }


              }
              else{
                $image_name=$current_image;

              }

            }
            else{
              $image_name=$current_image;
            }


            $sql2="UPDATE category SET title='$title', imagename='$image_name', featured='$featured', active='$active' WHERE id=$id ";

            $res2=mysqli_query($conn, $sql2);

            if($res==true){
               $_SESSION['update']="Updated successfully";
               header('location:'.SITEURL.'admin/category.php');
            }
            else{
              $_SESSION['update']="failed";
              header('location:'.SITEURL.'admin/category.php');

            }


          }
       ?>
  	</div>
  </div>


<?php 

include('Menu/footer.php');
?>