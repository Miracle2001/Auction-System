<?php 
include('buyer-authentication.php');
include("header.php");
include('dbcon.php');

?>

<div class="container">
    <div class="row">
        <?php 
        if(isset($_GET['stockid'])){




            date_default_timezone_set('Europe/Dublin');
            $date = date('Y-m-d H:i:s'); 
            $stock_id = $_GET['stockid'];
            $query = "select * from stock WHERE status='Active' AND stock_id='$stock_id'";
            $query_run = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($query_run))

            {   
                $stock_id = $row['stock_id'];
                $_SESSION['stock_id'] = $stock_id;

                
                

                
                            

                
        ?>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php  echo $row['auction_date_end']; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white"><?php echo $row['stock_name']; ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow mt-3">
                <div class="card-header">
                    <h5> Product Image </h5>
                    <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                </div>
                
                
            </div>
        </div>

        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-12 mt-3">
                        <h5>Current Bid: £<?php echo $row['current_bid']; ?> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Starting From: £<?php echo $row['starting_bid']; ?> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>End Time & Date: <p id="demo"></p> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Description: <?php echo $row['stock_description']; ?> </h5>
                    </div>

                    <?php if(($date> $row['auction_date_end'])): ?>

                        <div class="col-md-4 mt-3">
                            <button class="btn btn-danger">Auction Closed</a></button>
                        </div>

                        <div class="col-md-6 mt-3">
                            <button class="btn btn-info">View Auction Winner</a></button>
                        </div>
                            


                    <?php else : ?>

                        <div class="col-md-12 mt-3">
                       
                            <button class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="bid.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                            
                            <button id="dem" type="submit" class="btn" style="background-color:#6E806E;" ><a class="text-white" style="text-decoration:none;" href="watchlist.php?stockid=<?php echo $stock_id;?>">Watch this product</a></button>



                            

                            

                            
                        </div>

                        <div class="col-md-12 mt-3">
                            <button class="btn btn-info">Chat with Seller</a></button>
                        </div>



                    <?php endif; ?>

                                    


                </div>
            </div>
        </div>



        <?php 
                }
            }
        ?>



            
    </div>
</div>

<?php 
include("footer.php");
?>