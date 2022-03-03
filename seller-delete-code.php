<?php 

session_start();

include('dbcon.php');



    
if(isset($_POST['sellerdeleteprofile'])){

    $seller_id = $_SESSION['seller_delete_id'];
    
   
    
    $query = "DELETE FROM seller WHERE seller_id=$seller_id";
  
    $result = mysqli_query($con, $query);

    if($sresult){

        $_SESSION['status'] = "Record deleted successfully.";
        header("Location: view-seller.php");
        exit(0);
    } else {
    $_SESSION['status'] = "Something went wrong.";
    header("Location: view-seller.php");
    exit(0);
    }
}


?>