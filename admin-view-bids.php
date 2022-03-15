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
                        <h3 class="text-white">View Buyer's Bids</h3>
                    </div>
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
                                
                                <th scope="col"  style="text-align:center">First Name</th>
                                <th scope="col"  style="text-align:center">Last Name</th>
                                <th scope="col"  style="text-align:center">Product Name</th>
                                <th scope="col"  style="text-align:center">Email Address</th>
                                <th scope="col"  style="text-align:center">Bid Amount</th>
                                <th scope="col"  style="text-align:center">Bidding Date</th>
                                                                
                            </tr>
                        </thead>

                        <?php

                            $view_bid_query ="SELECT * FROM bid  JOIN stock ON bid.stock_id = stock.stock_id JOIN buyer on bid.buyer_id = buyer.buyer_id";
                            $view_bid_query_run = mysqli_query($con,$view_bid_query);
                            $view_bid_query_run_check = mysqli_num_rows($view_bid_query_run);

                            if ($view_bid_query_run_check > 0){
                                while ($row = mysqli_fetch_assoc($view_bid_query_run)) {
            
                                    
                                    
                                   
                                    
                                    
                                
            
                                    ?>
                                    <tr>
                                        <td><h6 class="text-center">  <?php  echo $row['first_name']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['last_name']?></h6> </td>
                                        <td><h6 class="text-center"><?php  echo $row['stock_name']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['email_address']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['bid_amount']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo $row['bidding_date_time']?></h6> </td>
                                        
                                        
                                    
                                        
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