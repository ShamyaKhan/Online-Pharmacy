<?php 
include('front/menu.php'); 
?>

<h1 > Please give your review </h1> <br> <br>
<div class="content" >
	<div class="wrapper">
		<table class="tbl-30">

         <form action="" method="POST" >
         <tr>
         	<td> Customer Name</td>
         <td>
         <input type="text" name="customer_name">
         </td>
        </tr>

        <tr> 
        	<td> Medicine Name</td>
         	<td>
         <input type="text" name="medicine_name">
     </td> 
     </tr>

     <tr>
     	<td> Give review </td>
     <td>


		<textarea name="review" cols="50" rows="10">  </textarea> <br> <br>

	</td> 
   </tr>
	    <tr> <td>
 		<input type="submit" name="submit" value="Submit your review">

 	</td> </tr>
 </table>

	    </form>
     <?php 
             if(isset($_POST['submit'])){

             	$review=$_POST['review'];
             	$customer_name=$_POST['customer_name'];
             	$medicine_name=$_POST['medicine_name'];

             	$sql="INSERT INTO  review SET Customer_name='$customer_name', Medicine_name='$medicine_name',
                 Review='$review'
             	 ";
             	 $res=mysqli_query($conn, $sql);
             	 if($res2==true){

                    $_SESSION['review']="<div class='success text-center' >Your review is taken</div>";
                    header('location:'.SITEURL);

                }
                else{
                    $_SESSION['review']="Error";
                    header('location:'.SITEURL);

             }
         }
	    ?>


	    

	</div>
</div>


<?php 
include('front/footer.php'); 
?> 