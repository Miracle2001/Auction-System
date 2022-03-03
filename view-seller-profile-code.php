<?php 

session_start();

include('dbcon.php');



    

if(isset($_POST['updateprofile'])){


    $street_address = mysqli_real_escape_string($con, $_POST['street_address']);
    $county = mysqli_real_escape_string($con, $_POST['county']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $eircode = mysqli_real_escape_string($con, $_POST['eircode']);
    $seller_edit_id =  $_SESSION['seller_edit_id'];
   

    
    $query = "SELECT * FROM seller WHERE seller_id='$seller_edit_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0){

        $update_token = "UPDATE seller SET street_address='$street_address', county='$county', city='$city', eircode='$eircode' WHERE seller_id='$seller_edit_id'";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run) {

                            
            $_SESSION['status'] = "Seller details has been updated";
            header("Location: view-seller.php");
            exit(0);

        } else {

            $_SESSION['status'] = "Something went wrong";
            header("Location: view-seller.php");
            exit(0);
                    
        }


    }



}







?>