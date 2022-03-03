<?php 

session_start();

include('dbcon.php');



    

if(isset($_POST['deleteprofile'])){


    
    $buyer_id =  $_SESSION['delete_buyer_id'];
   

    
    $query = "DELETE from buyer WHERE buyer_id=$buyer_id";
  
    $result = mysqli_query($con, $query);

    if($result){

        $_SESSION['status'] = "Record deleted successfully.";
        header("Location: view-buyer.php");
        exit(0);
    } else {

        $_SESSION['status'] = "Something went wrong.";
        header("Location: view-buyer.php");
        exit(0);
    }


    



}







?>