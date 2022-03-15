<?php 
session_start();
include('dbcon.php');
include("header.php");
?>


<?php

if(isset($_POST['submit'])){

    if(!isset($_SESSION['authenticated'])){

        echo "Plese login or register";
    }
}


?>


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Auction Catalogue</h3>
                </div>
            </div>
        </div>

        <!-- Category List  -->
        <div class="col-md-3">
            <form action="" method="GET">
                <div class="card shadow mt-3">
                    <div class="card-header">
                        <h5>Filter 
                            <button type="submit" style="background-color:#6E806E;" class="btn text-white btn-sm float-end">Search</button>
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

                        date_default_timezone_set('Europe/Dublin');
                        $date = date('Y-m-d H:i:s'); 
                        
                        if(isset($_GET['category'])) {

                            $categorychecked =[];
                            $categorychecked = $_GET['category'];
                            date_default_timezone_set('Europe/Dublin');
                            $date = date('Y-m-d H:i:s');    
                            foreach($categorychecked as $rowcategory){

                                //echo $rowcategory;
                                $products = "SELECT * FROM stock WHERE category_id IN ($rowcategory)";
                                $product_run = mysqli_query($con, $products);
                                if(mysqli_num_rows($product_run) > 0){


    
                                    foreach($product_run as $proditems):

                                        
                                        ?> 
                                            <div class="col-md-12 mt-3">
                                                <div class="border p-2">
                                                    <?php echo '<img src="data:image;base64,'.base64_encode($proditems['stock_image']).'" alt="Image" style="width: 110px; height: 110px;">'?><br>
                                                    <h6><?= $proditems['stock_name']; ?></h6>
                                                    <h6>Description: <?= $proditems['stock_description']; ?></h5>

                                                    

                                                    <?php if(!($date> $proditems['auction_date_end'])): ?>

                                                        <h6>End Date: <?= $proditems['auction_date_end']; ?></h6>


                                                    <?php else : ?>

                                                        <h6>End Date: Expired</h6>
                                                        <h6>Started on: <?= $proditems['auction_start_date']; ?></h6>



                                                    <?php endif; ?>

                                                    <button name="submit" type="submit" class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                                                    <button name="watch_list" type="submit" class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="watchlist.php?stockid=<?php echo $stock_id;?>">Watch this product</a></button>
                                
                                                    
                                                    

                                                    
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
                                                <?php echo '<img src="data:image;base64,'.base64_encode($proditems['stock_image']).'" alt="Image" style="width: 110px; height: 110px;">'?> <br>
                                                <h5><?= $proditems['stock_name']; ?></h6>
                                                <h6>Description: <?= $proditems['stock_description']; ?></h5>
                                                <?php if(!($date> $proditems['auction_date_end'])): ?>

                                                 <h6>End Date: <?= $proditems['auction_date_end']; ?></h6>


                                                <?php else : ?>

                                                    <h6>End Date: Expired</h6>
                                                    <h6>Started on: <?= $proditems['auction_start_date']; ?></h6>



                                                <?php endif; ?>

                                                

                                                <button name="submit" type="submit" class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                                                <button name="watch_list" type="submit" class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="watchlist.php?stockid=<?php echo $stock_id;?>">Watch this product</a></button>
                                
                                 
                                               
                                                
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
