<?php 

session_start();
include('dbcon.php');
if(isset($_POST['submit'])){

    if(!empty(trim( $_POST['emailaddress'])) && !empty(trim( $_POST['password']))){

        $email_address = mysqli_real_escape_string($con, $_POST['emailaddress']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $login_query = "SELECT * FROM seller WHERE emailaddress='$email_address' AND password='$password' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);
            

            if($row['verify_status'] == "1"){

                $_SESSION['authenticated'] = TRUE;
                $_SESSION['auth_user'] = [
                    'firstname' => $row['firstname'],
                    'studentid' => $row['studentid'],
                    'emailaddress' => $row['emailaddress'],
                ];

                $_SESSION['status'] = "You are logged in successfully.";
                header("Location: seller's-dashboard.php");
                exit(0);


            } else{
                $_SESSION['status'] = "Please Verify your email address to login.";
                header("Location: sellerlogin.php");
                exit(0);
            }


        } else {

            $_SESSION['status'] = "Invalid Email or Password";
            header("Location: sellerlogin.php");
            exit(0);

        }

    }else{
        $_SESSION['status'] = "All fields are Mandatory";
        header("Location: sellerlogin.php");
        exit(0);
    }

    

}


?>