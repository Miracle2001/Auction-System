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
        <div class="col-md-12 mt-5">
                <div class="card mt-12" style="background-color:#6E806E;">
                    <div class="card-header text-center">
                        <h3 class="text-white">Watch List</h3>
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
                                <th scope="col"  style="text-align:center">Current Bid</th>
                                <th scope="col"  style="text-align:center">Action</th>
                                
                                                                
                            </tr>
                        </thead>

                        <?php

                            $buyer_id = $_SESSION['buyer_id'];
                                    
                            $watch_list_query ="SELECT * FROM watchlist LEFT JOIN stock ON watchlist.stock_id = stock.stock_id WHERE buyer_id='$buyer_id'";
                            $watch_list_query_run = mysqli_query($con,$watch_list_query);
                            $watch_list_query_run_check = mysqli_num_rows($watch_list_query_run);

                            if($watch_list_query_run_check > 0){
                                while ($row = mysqli_fetch_assoc( $watch_list_query_run)) {
            
                                    
                                    
                                   
                                    
                                    
                                
            
                                    ?>
                                    <tr>
                                        <td><h6 class="text-center">  <?php  echo $row['stock_name']?></h6> </td>
                                        <td><h6 class="text-center"> <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?> </td>
                                        <td><h6 class="text-center"><?php  echo $row['current_bid']?></h6> </td>
                                        
                                        <td class="text-center">
                                            <button class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                                            <button class="btn btn-danger"><a class="text-white" style="text-decoration:none;" href="watchlist-delete.php?stockdeleteid=<?php echo $stock_id;?>">Delete</a></button>
                                        <td>
                                        
                                        
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