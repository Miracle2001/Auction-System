<?php 

session_start();
include('../dbcon.php');



if(isset($_POST['submit'])){

    $filename = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

    

    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
   
    $product_description = mysqli_real_escape_string($con, $_POST['product_description']);
    $reserve_price = mysqli_real_escape_string($con, $_POST['reserve_price']);
    $auction_date_start = mysqli_real_escape_string($con, $_POST['sd']);
    $result_date_start = date('Y-m-d', strtotime($auction_date_start));
    $auction_date_end = mysqli_real_escape_string($con, $_POST['ed']);
    $result_date_end = date('Y-m-d', strtotime($auction_date_end));
    $auction_time_start = mysqli_real_escape_string($con, $_POST['st']);
    $auction_time_end = mysqli_real_escape_string($con, $_POST['et']);
    
    
    $current_user =  $_SESSION["id"];
    $current_cat = $_SESSION['cat_id'];
    
   
    
   
    

   
    $query = "INSERT INTO items(item_name, item_image, item_desc, reserve_price, sd, ed, st, et, seller_id, category_id) VALUES ('{$product_name}', '{$filename}', '{$product_description}', '{$reserve_price}', '{$result_date_start}' , '{$result_date_end}' , '{$auction_time_start}' , '{$auction_time_end}', '{$current_user}', '{$current_cat}')";


    $insert_token_run = mysqli_query($con, $query);

   



   

    if($insert_token_run) {

                    
        $_SESSION['status'] = "item has been added";
        header("Location: seller-listing.php");
        exit(0);

    } else {

        $_SESSION['status'] = "Something went wrong";
        header("Location: seller-listing.php");
        exit(0);
                
    }
    
      
        
    

}

?>