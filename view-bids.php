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
                        <h3 class="text-white">Buyer's Bids</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class ="col-md-12 mt-3">
            <div class="card">
                <div class="card-body row">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                
                                <th scope="col"  style="text-align:center">Product Name</th>
                                <th scope="col"  style="text-align:center">Product Image</th>
                                <th scope="col"  style="text-align:center">Current Bidded</th>
                                <th scope="col"  style="text-align:center">Amount Bidded</th>
                                <th scope="col"  style="text-align:center">Date-Time</th>
                                
                                                                
                            </tr>
                        </thead>

                        <?php

                            $buyer_id = $_SESSION['buyer_id'];
                            $bid_query ="SELECT * FROM bid LEFT JOIN stock ON bid.stock_id = stock.stock_id WHERE buyer_id='$buyer_id'";
                            $bid_query_run = mysqli_query($con,$bid_query);
                            $bid_query_run_check = mysqli_num_rows($bid_query_run);

                            if ($bid_query_run_check > 0){
                                while ($row = mysqli_fetch_assoc($bid_query_run)) {

                                    
                                    
                                
                                    
                                    
                                

                                    ?>
                                    <tr>
                                        <td><h6 class="text-center">  <?php echo $row['stock_name']; ?></h6>  </td>
                                        <td><h6 class="text-center">  <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?> </td>
                                        <td><h6 class="text-center">  <?php echo $row['current_bid']; ?></h6> </td>
                                        <td><h6 class="text-center"> <?php echo $row['bid_amount']; ?></h6> </td>
                                        <td><h6 class="text-center"> <?php echo $row['bidding_date_time']; ?></h6> </td>
                                                                               
                                        
                                    
                                        
                                    </tr>

                                    <?php

                                

                                
                                

                                }
                            } else {
                                echo "You haven't placed any bis yets";
                            }








                        ?>
                    </table>
                        
                </div>
            </div>
        </div>

        












    </div>    
</div>
