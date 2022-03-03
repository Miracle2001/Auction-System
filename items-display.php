<?php 
session_start();
include('dbcon.php');
include("header.php");
?>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Auction Catalogue</h4>
                </div>
            </div>
        </div>

        <!-- Category List  -->
        <div class="col-md-3">
            <form action="" method="GET">
                <div class="card shadow mt-3">
                    <div class="card-header">
                        <h5>Filter 
                            <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                        </h5>
                    </div>
                    <div class="card-body">
                        <h6>Category List</h6>
                        <hr>
                        <?php
                            

                            $category_query = "SELECT * FROM category WHERE status='Active'";
                            $category_query_run  = mysqli_query($con, $category_query);

                            if(mysqli_num_rows($category_query_run) > 0)
                            {
                                foreach($category_query_run as $categorylist)
                                {
                                    $checked = [];
                                    if(isset($_GET['category']))
                                    {
                                        $checked = $_GET['category'];
                                    }
                                    ?>
                                        <div>
                                            <input type="checkbox" name="category[]" value="<?= $categorylist['category_id']; ?>" 
                                                <?php if(in_array($categorylist['category_id'], $checked)){ echo "checked"; } ?>
                                                />
                                            <?= $categorylist['category_name']; ?>
                                        </div>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "No Category Found";
                            }
                        ?>
                    </div>
                </div>
            </form>
        </div>

        <!-- Category items -Stock  -->
        <div class="col-md-9 mt-3">
            <div class="card">
                <div class="card-body row">
                    <?php 
                        
                        if(isset($_GET['category'])) {

                            $categorychecked =[];
                            $categorychecked = $_GET['category'];
                            foreach($categorychecked as $rowcategory){

                                //echo $rowcategory;
                                $products = "SELECT * FROM stock WHERE category_id IN ($rowcategory)";
                                $product_run = mysqli_query($con, $products);
                                if(mysqli_num_rows($product_run) > 0){
    
                                    foreach($product_run as $proditems):
                                        ?> 
                                            <div class="col-md-12 mt-3">
                                                <div class="border p-2">
                                                    <h6><?= $proditems['stock_name']; ?></h6>
                                                    <h6>Description: <?= $proditems['stock_description']; ?></h5>
                                                    <h6>End Date: <?= $proditems['auction_date_end']; ?></h6>

                                                    <button class="btn btn-info"><a href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                                    
                                    
                                                    <button name="watch_list" type="submit" class="btn btn-primary">Watch this product</button>
                                                </div>
                                            </div>
    
                                        <?php
                                    
                                    endforeach;
    
                                } else {
                                    echo "No Item Found";
                                }

                            }

                        }else {

                        
                            $products = "SELECT * FROM stock";
                            $product_run = mysqli_query($con, $products);
                            if(mysqli_num_rows($product_run) > 0){



                                foreach($product_run as $proditems):

                                    $stock_id = $proditems['stock_id'];
                        
                                    ?> 
                                        <div class="col-md-12 mt-3">
                                            <div class="border p-2">
                                                <h5><?= $proditems['stock_name']; ?></h6>
                                                <h6>Description: <?= $proditems['stock_description']; ?></h5>
                                                <h6>End Date: <?= $proditems['auction_date_end']; ?></h6>

                                                <button class="btn btn-info"><a href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                                
                                 
                                                <button name="watch_list" type="submit" class="btn btn-primary">Watch this product</button>
                                                
                                            </div>
                                        </div>

                                    <?php
                                
                                endforeach;

                            } else {
                                echo "No Category Found";
                            }
                        }


                    ?>
                </div>
            </div>
        </div>

    </div>
</div>


<?php 
include("footer.php");
?>
