<?php 
session_start();
include('dbcon.php');
include("header.php");

?>

<div class="container">
    <form action="bid-code.php" method="post" class="row g-3 needs-validation">
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

            <div class="col-md-12 mt-5">
                <div class="card mt-3">
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


                    <div class="card-header">
                        <h4><?php echo $row['stock_name']; ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">

                <div class="card">
                    <div class="card-body row">

                        <div class="col-md-12 mt-3">
                            <h5>Description: <?php echo $row['stock_description']; ?> </h5>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h5>Starting From: £<?php echo $row['starting_bid']; ?> </h4>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h5>Current Bid: £<?php echo $row['current_bid']; ?> </h4>
                        </div>

                        <?php if(!($date> $row['auction_date_end'])): ?>

                            <div class="col-md-12 mt-3">
                                <label for="bid" class="form-label">Your bid </label>
                                <input type="text" class="form-control" name="bid" id="bid"  required>
                            </div>

                                               

                            <div class="col-md-12 mt-3">
                                <button name="submit" type="submit" class="btn btn-primary">Submit bid</button>
                            </div>



                        <?php else : ?>

                            <div class="col-md-12 mt-3">
                                <button class="btn btn-danger">Auction Closed</a></button>
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
    </form>     
</div>

<?php 
include("footer.php");
?>