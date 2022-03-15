<?php 
session_start();
include('dbcon.php');
include("header.php");
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12">
                <div class="card-header">
                    <h4>View Product</h4>
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
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Start Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col">Reserve bid</th>
                                <th scope="col">Starting bid</th>
                                <th scope="col">Current bid</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                
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
                                        <td> <?php  echo $row['stock_name']?> </td>
                                        <td> <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 180px; height: 180px;">'?> </td>
                                        <td> <?php  echo $row['stock_description']?> </td>
                                        <td> <?php  echo $row['auction_start_date']?> </td>
                                        <td> <?php  echo $row['auction_date_end']?> </td>
                                        <td> <?php  echo $row['reserve_price']?> </td>
                                        <td> <?php  echo $row['starting_bid']?> </td>
                                        <td> <?php  echo $row['current_bid']?> </td>
                                        <td> <?php  echo $row['status']?> </td>
                                        

                                        <td> 
                                            
                                            <button class="btn btn-info"><a href="edit-product.php?producteditid=<?php echo $edit_product_id; ?>">Edit</a></button>
                                            <button class="btn btn-danger"><a href="deleteproduct.php?productdeleteid=<?php echo $delete_product_id; ?>">Delete</a></button>
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