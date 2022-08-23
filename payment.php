<?php  

 include('front/menu.php');
?>

<?php 
               if(isset($_POST['submit'])){

                $med=$_POST['med'];
                $price=$_POST['price'];
                $quantity=$_POST['quantity'];
                $total=$price * $quantity;
                $order_date=date("Y-m-d h:i:sa");
                $status="Ordered";
                $customer_name=$_POST['full-name'];
                $customer_contact=$_POST['contact'];
                $email=$_POST['email'];
                $address=$_POST['address'];

                $sql2="INSERT INTO `order`(`med`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `email`, `address`) VALUES ('$med', $price, $quantity, $total, '$order_date', '$status','$customer_name','$customer_contact','$email','$address')";
                
                $res2=mysqli_query($conn, $sql2);
                if($res2==true){

                    $_SESSION['order']="<div class='success text-center' >Medicine ordered successfully</div>";
                    header('location:'.SITEURL);

                }
                else{
                    $_SESSION['order']="Error";
                    header('location:'.SITEURL);


                }

               }
            ?>


<?php  
 
  include('front/footer.php');

?>