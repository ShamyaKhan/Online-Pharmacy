  <?php  
     include('front/menu.php'); 
  ?>
<?php 

     if(isset($_GET['medicine_id'])){

     $medicine_id=$_GET['medicine_id'];

     $sql="SELECT * FROM medicine WHERE id=$medicine_id ";
     $res=mysqli_query($conn, $sql);
     $count=mysqli_num_rows($res);
     if($count==1){
          
          $row=mysqli_fetch_assoc($res);
          $title=$row['title'];
          $price=$row['price'];
          $image_name=$row['image_name'];

     }
     else{
        header('location:'.SITEURL);

     }

    }

     else{

      header('location:'.SITEURL);
      }
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="<?php echo SITEURL; ?>payment.php" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img"> 
                    
                    <?php 
                       if($image_name==""){

                        echo "image not available";

                       }
                       else{

                        ?>

                      <img src="<?php echo SITEURL; ?>images/medicines/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                        <?php 

                       }
                    ?>                     
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="med" value="<?php echo $title; ?>">
                        <p class="food-price"><?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="quantity" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('front/footer.php'); ?>