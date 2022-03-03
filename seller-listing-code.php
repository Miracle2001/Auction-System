<?php 

session_start();
include('dbcon.php');



if(isset($_POST['submit'])){

    $filename = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    

    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
   
    $product_description = mysqli_real_escape_string($con, $_POST['product_description']);
    $reserve_price = mysqli_real_escape_string($con, $_POST['reserve_price']);
    $starting_bid = mysqli_real_escape_string($con, $_POST['starting_bid']);
    $auction_start_date = mysqli_real_escape_string($con, $_POST['sd']);
    $date_start = strtotime($auction_start_date);
    $result_date_start = date("Y-m-d H:i:s",$date_start);
    $auction_date_end = mysqli_real_escape_string($con, $_POST['ed']);
    $date_end = strtotime($auction_date_end);
    $result_date_end = date("Y-m-d H:i:s", $date_end);
    
    
    
    $current_user =  $_SESSION["id"];
    $current_cat = $_SESSION['cat_id'];
    
    
   
    
   
    

   
    $query = "INSERT INTO stock(stock_name, stock_image, stock_description, starting_bid, reserve_price, auction_start_date, auction_date_end, seller_id, category_id) VALUES ('{$product_name}', '{$filename}', '{$product_description}', '{$starting_bid}', '{$reserve_price}', '{$result_date_start}', '{$result_date_end}', '{$current_user}', '{$current_cat}')";


    $insert_token_run = mysqli_query($con, $query);

   



   

    if($insert_token_run) {

                    
        $_SESSION['status'] = "item has been added";
        header("Location: category.php");
        exit(0);

    } else {

        $_SESSION['status'] = "Something went wrong";
        header("Location: category.php");
        exit(0);
                
    }
    
      
        
    

}

?>