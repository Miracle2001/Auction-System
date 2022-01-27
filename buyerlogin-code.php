<?php 

session_start();
include('dbcon.php');
if(isset($_POST['submit'])){

    if(!empty(trim( $_POST['emailaddress'])) && !empty(trim( $_POST['password']))){

        $email_address = mysqli_real_escape_string($con, $_POST['emailaddress']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $email_search = "SELECT * FROM buyer WHERE emailaddress='$email_address'";
        $email_search_query_run = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($email_search_query_run);

        if($email_count) {
            
            $email_pass = mysqli_fetch_assoc($email_search_query_run);

            $db_pass = $email_pass['password'];
            
            $pass_decode = password_verify($password, $db_pass);

            if($pass_decode ){
            

                if($email_pass['verify_status'] == "1"){

                    $_SESSION['authenticated'] = TRUE;
                    
                    $_SESSION['status'] = "You are logged in successfully.";
                    header("Location: buyer's-dashboard.php");
                    exit(0);


                } else{
                    $_SESSION['status'] = "Please Verify your email address to login.";
                    header("Location: buyerlogin.php");
                    exit(0);
                }


            } 
            else {

                $_SESSION['status'] = "Invalid Email or Password";
                header("Location: buyerlogin.php");
                exit(0);

            }

        }

        

    }else{
        $_SESSION['status'] = "All fields are Mandatory";
        header("Location: buyerlogin.php");
        exit(0);
    }

    

}


?>