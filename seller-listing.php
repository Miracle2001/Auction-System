
<?php 
session_start();
include('dbcon.php');
include("header.php");
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Tell us about your product</h3>
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

        <form action="seller-listing-code.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation">
            <?php 
                if(isset($_GET['categoryid'])){

                    $categoryid = $_GET['categoryid'];
                    $query = "select * from category WHERE status='Active' AND category_id='$categoryid'";
                    $query_run = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($query_run))

                    {   $category_id = $row['category_id'];
                        $_SESSION['cat_id'] = $category_id;
                        
                        
                    
            
            ?>
            <div class ="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-6 mt-2">
                            <label for="product_category" class="form-label"> Product Category</label>
                            <input type="text" class="form-control" name="product_category" id="product_category" value="<?php echo $row['category_name']; ?>" readonly>
                        </div>
                        <?php 
                                }
                            }
                        ?>

                        <div class="col-md-6 mt-2">
                            <label for="product_name" class="form-label"> Product name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" required>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="product_description" class="form-label">Product Description</label>
                            <textarea class="form-control" placeholder="Product Description" name="product_description" id="product_description"  rows="5" required></textarea>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="image">Select image:</label>
                            <input type="file" id="image" class="form-control" name="image" accept="image/*" value="">
                            
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="starting_bid" class="form-label">Starting Bid</label>
                            <input type="number" step=0.01 class="form-control" name="starting_bid" id="starting_bid" placeholder="Starting Bid" aria-describedby="emailHelp" required>
                        
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="reserve_price" class="form-label">Reserve price</label>
                            <input type="number" step=0.01 class="form-control" name="reserve_price" id="reserve_price" placeholder="Reserve Price" aria-describedby="emailHelp" required>
                        
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="sd" class="form-label">Start date-time</label>
                            <input type="datetime-local" id="sd" name="sd"  class="form-control"  required>
                            
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for="sd" class="form-label">End date-time</label>
                            <input type="datetime-local" id="ed" name="ed"  class="form-control"  required>
                            
                        </div>
                        <div class="col-md-12 mt-2">
                            <button name="submit" style="background-color:#6E806E;" type="submit" class="btn text-white">Post</button>
                        </div>




                    </div>
                </div>
            </div>

           
        </form>



    </div>
</div>


        
<?php 

include("footer.php");

?> 

