<?php   
  include('Menu/menu.php');
?>

 <div class="content">
 	<div class="wrapper">

 		<table class="tbl-full">

 			<tr>
 				<th> Customer Name </th>
 				<th> Medicine Name </th>
 				<th> Review </th> 

 			<tr>

 				<?php  
                  
                  $sql="SELECT * FROM review ";
                  $res=mysqli_query($conn, $sql);
                  if($res==true){
                      $count=mysqli_num_rows($res);
                      if($count>0){
                      	while($row=mysqli_fetch_assoc($res)){
                      		$customer_name=$row['Customer_name'];
                      		$medicine_name=$row['Medicine_name'];
                      		$review=$row['Review'];

                      	   ?>
                             
                          <tr>
                          	<td> <?php echo $customer_name; ?> </td>
                          	<td> <?php  echo $medicine_name; ?></td>
                          	<td>  <?php echo $review; ?></td>

                          </tr>

                      	   <?php
                      	}
                      }
                  }
                  else{

                  }
                
 				?>

 		</table>	
 		
 	</div>
 	
 </div>


<?php
include('Menu/footer.php');  
?>

