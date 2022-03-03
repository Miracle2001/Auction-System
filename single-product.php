<?php 
session_start();
include('dbcon.php');
include("header.php");
?>

<div class="container">
    <div class="row">
        <?php 
        if(isset($_GET['stockid'])){

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
            <div class="card mt-3">
                <div class="card-header">
                    <h4><?php echo $row['stock_name']; ?></h4>
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
                        <h5>Current Bid: </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Reserve Price: £<?php echo $row['reserve_price']; ?> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>End Time & Date: <p id="demo"></p> </h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Description: <?php echo $row['stock_description']; ?> </h5>
                    </div>

                    <div class="col-md-12 mt-3">
                        <button class="btn btn-info"><a href="bid.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                        <button class="btn btn-info"><a href="view-seller-profile.php?sellereditid=<?php echo $edit_seller_id;?>">Watch this item</a></button>
                    </div>

                    <div class="col-md-12 mt-3">
                        <button class="btn btn-info">Chat with Seller</a></button>
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

<?php 
include("footer.php");
?>