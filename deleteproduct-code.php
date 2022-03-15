<?php 

session_start();

include('dbcon.php');



    

if(isset($_POST['deleteproduct'])){


    
    $product_id =  $_SESSION['product_delete_id'];
   

    
    $d_query = "DELETE from stock WHERE stock_id=$product_id";
  
    $product_out = mysqli_query($con, $d_query);

    if($product_out){

        $_SESSION['status'] = "Record deleted successfully.";
        header("Location: view-product.php");
        exit(0);
    } else {

        $_SESSION['status'] = "Something went wrong.";
        header("Location: view-product.php");
        exit(0);
    }


    



}







?>