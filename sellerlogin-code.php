<?php 

session_start();
include('dbcon.php');
if(isset($_POST['submit'])){

    if(!empty(trim( $_POST['email_address'])) && !empty(trim( $_POST['password']))){
        $email_address = mysqli_real_escape_string($con, $_POST['email_address']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $email_search = "SELECT * FROM seller WHERE email_address='$email_address'";
        $email_search_query_run = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($email_search_query_run);

        if($email_count) {
            
            $email_pass = mysqli_fetch_assoc($email_search_query_run);

            $db_pass = $email_pass['password'];
            
            $pass_decode = password_verify($password, $db_pass);

            if($pass_decode ){
            

                if($email_pass['verify_status'] == "1"){

                    $_SESSION['authenticated'] = TRUE;

                    $user_id = $email_pass['seller_id'];
                    $_SESSION["id"] = $user_id;

                    $seller_name = $email_pass['first_name'];
                    $_SESSION["seller_name"] =  $seller_name;
                    
                    

                    
                   
                  

                    header("Location: seller-dashboard.php");
                    exit(0);


                } else{
                    $_SESSION['status'] = "Please Verify your email address to login.";
                    header("Location: sellerlogin.php");
                    exit(0);
                }


            } 
            else {

                $_SESSION['status'] = "Invalid Email or Password";
                header("Location: sellerlogin.php");
                exit(0);

            }

        }

        

    }else{
        $_SESSION['status'] = "All fields are Mandatory";
        header("Location: sellerlogin.php");
        exit(0);
    }

    

}


?>