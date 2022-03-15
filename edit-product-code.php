<?php 

session_start();

include('dbcon.php');


$stock_id = $_SESSION['product_edit_id'];
 

if(isset($_POST['updatestockprofile'])){

   


   
    $product_status =  $_POST['status'];
    
   

    
    $update_stock = "UPDATE stock SET  status='$product_status' WHERE stock_id='$stock_id' LIMIT 1";
    $update_stock_run = mysqli_query($con, $update_stock);

    if($update_stock_run) {

                    
        $_SESSION['status'] = "Product has been updated";
        header("Location: view-product.php");
        exit(0);

    } else {

        $_SESSION['status'] = "Something went wrong";
        header("Location: edit-product.php");
        exit(0);
                
    }


}







?>