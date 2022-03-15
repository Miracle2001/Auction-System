<?php 
session_start();
include('dbcon.php');
include("header.php");
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Product Information</h3>
                </div>
            </div>
        </div>

        <table class="table mt-5">
            <thead>
                <tr>
                    
                    <th scope="col" style="text-align:center">Product Name</th>
                    <th scope="col" style="text-align:center">Image</th>
                    <th scope="col" style="text-align:center">Description</th>
                    <th scope="col" style="text-align:center">Reserve bid</th>
                    <th scope="col" style="text-align:center">Starting bid</th>
                    <th scope="col" style="text-align:center">Current bid</th>
                    
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
                            <td> <h6 class="text-center"><?php  echo $row['stock_name']?></h6> </td>
                            <td> <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?> </td>
                            <td> <h6 class="text-center"><?php  echo $row['stock_description']?></h6> </td>
                            <td> <h6 class="text-center"><?php  echo $row['reserve_price']?></h6> </td>
                            <td> <h6 class="text-center"><?php  echo $row['starting_bid']?></h6> </td>
                            <td> <h6 class="text-center"><?php  echo $row['current_bid']?></h6> </td>
                            
                        
                            
                        </tr>

                        <?php

                    

                    
                    

                    }
                }
            ?>


        </table>


    </div>
</div>

<?php 
include("footer.php");
?>