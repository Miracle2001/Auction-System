<?php

session_start();

include('../dbcon.php');

if(isset($_POST['updateprofile'])){

    //echo $_SESSION['seller_id'];
    
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $email_address = mysqli_real_escape_string($con, $_POST['email_address']);
    $current_password = mysqli_real_escape_string($con, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);


    $new_password_encryption = password_hash($new_password, PASSWORD_BCRYPT);

   
   
    
    $current_user = $_SESSION["id"];
    $check_email_query = "SELECT * FROM buyer WHERE buyer_id='$current_user' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

  

    if(mysqli_num_rows($check_email_query_run) > 0){

        //echo $current_user;

        $row = mysqli_fetch_array($check_email_query_run);

        $get_first_name = $row['first_name'];
        $get_last_name = $row['last_name'];
        $get_student_id = $row['student_id'];
        $get_email = $row['email_address'];
        $password = $row['password'];
              
        $pass_decode = password_verify($current_password, $password);       
       
        if($pass_decode){

            $update_token = "UPDATE buyer SET first_name='$first_name', last_name='$last_name', student_id='$student_id', email_address='$email_address', password='$new_password_encryption' WHERE seller_id='$current_user' LIMIT 1";
            $update_token_run = mysqli_query($con, $update_token);

            if($update_token_run) {

                            
                $_SESSION['status'] = "My Details has been updated";
                header("Location: seller-dashboard.php");
                exit(0);

            } else {

                $_SESSION['status'] = "Something went wrong";
                header("Location: seller-dashboard.php");
                exit(0);
                        
            }

        } else {
            $_SESSION['status'] = "Password doesn't match existing password";
            header("Location: seller-edit-profile.php");
            exit(0);


        }

            

              
        
        
    }  else {
        $_SESSION['status'] = "This account doesn't exist";
        header("Location: sellerregistration.php");
        exit(0);
    }
    
        
           
      
                  
    
      
        
    

}





?>