<?php 
session_start();
include('dbcon.php');
include("header.php");
?>
<div class="container">
    
        
    <h4>Select A Category</h4>

    <table class="table">
        <thead>
            <tr>
                
                <th scope="col">Product Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Reserve bid</th>
                <th scope="col">Starting bid</th>
                <th scope="col">Current bid</th>
                
            </tr>
        </thead>

        <?php 
          
            $current_user =  $_SESSION["id"];

            $product_query ="SELECT * FROM stock WHERE seller_id='$current_user'";
            $product_query_run = mysqli_query($con,$product_query);
            $product_query_run_check = mysqli_num_rows($product_query_run);

            if ($product_query_run_check > 0){
                while ($row = mysqli_fetch_assoc($product_query_run)) {
                                     
                    
                    $stock_id = $row['stock_id'];
                    $_SESSION['stock_id'] = $stock_id;
                   

                    ?>
                    <tr>
                        <td> <?php  echo $row['stock_name']?> </td>
                        <td> <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?> </td>
                        <td> <?php  echo $row['stock_description']?> </td>
                        <td> <?php  echo $row['reserve_price']?> </td>
                        <td> <?php  echo $row['starting_bid']?> </td>
                        
                      
                        
                    </tr>

                    <?php

                  

                
                

                }
            }
        ?>


  
        
    </table>
   

</div>

<?php 
include("footer.php");
?>