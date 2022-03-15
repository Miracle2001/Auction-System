
<?php 
session_start();
include('dbcon.php');
include("header.php");
?>




<div class="container">
    <div class="row">

        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Edit Product Information</h3>
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
                    <form action="edit-product-code.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation">
                        <?php 

                            if(isset($_GET['producteditid'])){
                                $productedit_id = $_GET['producteditid'];
                                $_SESSION['product_edit_id'] = $productedit_id;
                                $product_query = "SELECT * FROM stock WHERE stock_id='$productedit_id'";
                                $product_query_run = mysqli_query($con,$product_query);
                                while($row = mysqli_fetch_array($product_query_run)){

                                





                        ?>

                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">Product Name</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['stock_name'];?>" id="first_name"  readonly>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">Product Image</label>
                            <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">Product Description</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['stock_description'];?>" id="first_name"  readonly>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">Start Date</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['auction_start_date'];?>" id="first_name"  readonly>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">End Date</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['auction_date_end'];?>" id="first_name"  readonly>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">Starting Bid</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['starting_bid'];?>" id="first_name"  readonly>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">Reserve Bid</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['reserve_price'];?>" id="first_name"  readonly>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">Current Bid</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['current_bid'];?>" id="first_name"  readonly>
                        </div>


                        <?php 
                                }
                            }
                            


                        ?>

                        

                        <div class="col-md-12 mt-2">
                            <select name="status" id="status" class="form-control">
                                <option value=''>Select Status</option>
                                <?php
                                $arr = array("Active","Inactive");
                                foreach($arr as $val)
                                {
                                    if($val == $rsedit['status'])
                                    {
                                    echo "<option value='$val' selected>$val</option>";
                                    }
                                    else
                                    {
                                    echo "<option value='$val'>$val</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-12 mt-2">
                            <button name="updatestockprofile" type="submit" style="background-color:#6E806E;" class="btn text-white">Update Product Information</button>
                        </div>





                    </form>
                </div>
            </div>
        </div>




      
        
        
       
    </div>
    

</div>


<?php 
include("footer.php");
?>

