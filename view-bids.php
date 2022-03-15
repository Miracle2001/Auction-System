<?php 
session_start();
include('dbcon.php');
include("header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Buyer's Bids</h4>
                    </div>
                </div>
            </div>
        </div>

        <?php 
          
          
          $buyer_id = $_SESSION['buyer_id'];
          $bid_query ="SELECT * FROM bid LEFT JOIN stock ON bid.stock_id = stock.stock_id WHERE buyer_id='$buyer_id'";
          $bid_query_run = mysqli_query($con,$bid_query);
          $bid_query_run_check = mysqli_num_rows($bid_query_run);

          if ($bid_query_run_check > 0){
              while ($row = mysqli_fetch_assoc($bid_query_run)) {

                    $bid_amount = $row['bid_amount'];
                    $bidding_date_time = $row['bidding_date_time'];
                    $stock_name = $row['stock_name'];
                    $stock_image = $row['stock_image'];
                    $current_bid = $row['current_bid'];

                    
                

            
                                   
                  
   

                        
           

              
          
        ?>

        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body row">

                    
                    <div class="col-md-12 mt-3">
                        <h5>Product Name: <?php echo $row['stock_name']; ?> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                    </div>


                   
                    <div class="col-md-12 mt-3">
                        <h5>Current Bid: £<?php echo $row['current_bid']; ?> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Amount Bidded: £<?php echo $row['bid_amount']; ?> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Date-Time<?php echo $row['bidding_date_time']; ?> </h4>
                    </div>



                    
                    

                    <div class="col-md-12 mt-3">
                    
                        <button class="btn btn-info"><a href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                        <button class="btn btn-info"><a href="view-seller-profile.php?sellereditid=<?php echo $edit_seller_id;?>">Watch this item</a></button>
                    </div>

                        
                                    


                </div>
            </div>
        </div>



        <?php 
              }
          }
            
        ?>












    </div>    
</div>
