<?php 
session_start();
include('../dbcon.php');
include("../header.php");
?>





<div class="container">
    <form action="#" method="post">
        <table class="table">
            

            <?php 
            
                

                $item_query ="SELECT * FROM stock WHERE status= 'Active'";
                $item_query_run = mysqli_query($con,$item_query);
                $item_query_run_check = mysqli_num_rows($item_query_run);

                if ($item_query_run_check > 0){
                    while ($row = mysqli_fetch_assoc($item_query_run)) {

                        
                      
                                                 
                        

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

            <tbody>
                <tr>
                    <td> <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?> </td>
                    <td> <?php  echo $row['stock_name']?> <br>
                        <?php  echo $row['stock_description']?> <br>
                        <?php  echo $row['starting_bid']?><br>
                        <?php  echo $row['reserve_price']?> <br>
                        <p id="demo"></p>
                    
                        
                                 
                                 

                                 
                    </td>
                </tr>
                
            </tbody>
            <?php 
                    }
                }
            ?>



            
        </table>

    </form>
</div>



<?php 
include("../footer.php");
?>
