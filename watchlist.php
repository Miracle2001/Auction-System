<?php 
session_start();
include('dbcon.php');
include("header.php");

?>

<?php 

if(isset($_GET['stockid'])){

   
    $stock_id = $_GET['stockid'];
    $buyer_id = $_SESSION['buyer_id'];
    
    
  
    
    $watchquery = "INSERT INTO watchlist (stock_id, buyer_id) VALUES ('{$stock_id}', '{$buyer_id}')";
    $watchquery_run = mysqli_query($con, $watchquery);

    


       
        
           
      
                  
    
      
        
    

}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Watch List</h4>
                    </div>
                </div>
            </div>
        </div>

        <?php 
          
          $buyer_id = $_SESSION['buyer_id'];
          
          $watch_list_query ="SELECT * FROM watchlist LEFT JOIN stock ON watchlist.stock_id = stock.stock_id WHERE buyer_id='$buyer_id'";
          $watch_list_query_run = mysqli_query($con,$watch_list_query);
          $watch_list_query_run_check = mysqli_num_rows($watch_list_query_run);

          if ($watch_list_query_run_check > 0){
              while ($row = mysqli_fetch_assoc( $watch_list_query_run)) {

                    
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
                    
                        <button class="btn btn-info"><a href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                        <button class="btn btn-danger">Delete</button>
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
