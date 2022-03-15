<?php 
session_start();
include('dbcon.php');
include("header.php");
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">View Products</h3>
                </div>
            </div>
        </div>

        <?php 
            if(isset($_SESSION['status'])) {
                ?>
                <div class="alert alert-success">
                    <h5><?= $_SESSION['status']; ?></h5>                  

                </div>
                <?php
                unset($_SESSION['status']);
            }
        ?>

        <div class ="col-md-12 mt-3">
            <div class="card">
                <div class="card-body row">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                
                                <th scope="col" style="text-align:center">Product Name</th>
                                <th scope="col" style="text-align:center">Image</th>
                                <th scope="col" style="text-align:center">Description</th>
                                <th scope="col" style="text-align:center">Start Date</th>
                                <th scope="col" style="text-align:center">End Date</th>
                                <th scope="col" style="text-align:center">Reserve bid</th>
                                <th scope="col" style="text-align:center">Starting bid</th>
                                <th scope="col" style="text-align:center">Current bid</th>
                                <th scope="col" style="text-align:center">Status</th>
                                <th scope="col" style="text-align:center">Action</th>
                                
                            </tr>
                        </thead>

                        <?php 
                            $stock_query ="SELECT * FROM stock";
                            $stock_query_run = mysqli_query($con,$stock_query);
                            $stock_query_run_check = mysqli_num_rows($stock_query_run);

                            if ($stock_query_run_check > 0){
                                while ($row = mysqli_fetch_assoc($stock_query_run)) {
                                                     
                                    $edit_product_id = $row['stock_id'];
                                    $delete_product_id = $row['stock_id'];
                                    
                                   
                
                                    ?>
                                    <tr>
                                        <td><h6 class="text-center"> <?php  echo $row['stock_name']?></h6> </td>
                                        <td> <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 180px; height: 180px;">'?> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['stock_description']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['auction_start_date']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['auction_date_end']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['reserve_price']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['starting_bid']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['current_bid']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['status']?></h6> </td>
                                        

                                        <td> 
                                            <div class="container">
                                                <button class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="edit-product.php?producteditid=<?php echo $edit_product_id; ?>">Edit</a></button>
                                            </div>
                                            <div class="container mt-2">
                                                <button class="btn btn-danger"><a class="text-white" style="text-decoration:none;" href="deleteproduct.php?productdeleteid=<?php echo $delete_product_id; ?>">Delete</a></button>
                                            </div>
                                        </td>
                                        
                                      
                                        
                                    </tr>
                
                                    <?php
                
                                  
                
                                
                                
                
                                }
                            }
                        ?>





                    </table>



                </div>
            </div>
        </div>

    </div>
</div>












<?php 
include("footer.php");
?>