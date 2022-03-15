<?php 
session_start();
include('dbcon.php');
include("header.php");
?>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12">
                <div class="card-header">
                    <h4>Product Information</h4>
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
                    <form action="deleteproduct-code.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation">
                    <?php 

                        if(isset($_GET['productdeleteid'])){
                            $productdelete_id = $_GET['productdeleteid'];
                            $_SESSION['product_delete_id'] = $productdelete_id;
                            $stock_d_query = "SELECT * FROM stock WHERE stock_id='$productdelete_id'";
                            $stock_d_query_run = mysqli_query($con,$stock_d_query);
                            while($row = mysqli_fetch_array($stock_d_query_run)){

                           
                                





                    ?>

                    <div class="col-md-12">
                        <label for="first_name" class="form-label">Product Name</label>
                        <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['stock_name'];?>" id="first_name"  readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="first_name" class="form-label">Product Image</label>
                        <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                    </div>

                    <div class="col-md-12">
                        <label for="first_name" class="form-label">Product Description</label>
                        <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['stock_description'];?>" id="first_name"  readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="first_name" class="form-label">Start Date</label>
                        <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['auction_start_date'];?>" id="first_name"  readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="first_name" class="form-label">End Date</label>
                        <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['auction_date_end'];?>" id="first_name"  readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="first_name" class="form-label">Starting Bid</label>
                        <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['starting_bid'];?>" id="first_name"  readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="first_name" class="form-label">Reserve Bid</label>
                        <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['reserve_price'];?>" id="first_name"  readonly>
                    </div>

                    <div class="col-md-12">
                        <label for="first_name" class="form-label">Current Bid</label>
                        <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['current_bid'];?>" id="first_name"  readonly>
                    </div>
                    <div class="col-md-12">
                            <label for="first_name" class="form-label">Status</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['status'];?>" id="first_name"  readonly>
                        </div>



                    <?php 
                            }
                        }
                        


                    ?>
                    <div class="col-12">
                            <button name="deleteproduct" type="submit" class="btn btn-primary">Delete Product Information</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>



    </div>
</div>