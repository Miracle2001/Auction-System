<?php 
session_start();
include('dbcon.php');
include("header.php");
?>

<div class="container">
    <form action="#" method="post" class="row g-3 needs-validation">
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

            <div class="col-md-12 mt-5">
                <div class="card mt-3">
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
                            <h5>Current Bid: </h4>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h5>Reserve Price: £<?php echo $row['reserve_price']; ?> </h4>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="bid" class="form-label">Your bid </label>
                            <input type="text" class="form-control" name="bid" id="bid"  required>
                        </div>

                                               

                        <div class="col-md-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Submit bid</button>
                        </div>


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