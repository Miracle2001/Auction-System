<?php 

session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function send_password_reset($get_email,$token){
    $mail = new PHPMailer(true);

    
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "eauction13@gmail.com";                     //SMTP username
        $mail->Password   = "Finalyear@2022";                              //SMTP password
        $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("eauction13@gmail.com", "EAUCTION");
        $mail->addAddress($get_email);     //Add a recipient
                             

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Reset Password Notification";
        $email_template ="
            <h2> Please click on the link below to reset your password.</h2>
            
            <br/><br/>
            <a href='http://localhost/php/seller-change-password.php?token=$token&emailaddress=$get_email'> Password Reset </a>
        ";
        $mail->Body = $email_template;
        

        $mail->send();
        echo 'Message has been sent';
    

}



if(isset($_POST['submit'])){
    
    $email_address = mysqli_real_escape_string($con, $_POST['emailaddress']);
    $token =  md5(rand());

   
    
    $check_email_query = "SELECT emailaddress FROM seller WHERE emailaddress='$email_address' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

  

    if(mysqli_num_rows($check_email_query_run) > 0){

        $row = mysqli_fetch_array($check_email_query_run);
       // $get_name = $row['sellerid'];
        $get_email = $row['emailaddress'];
                
       
        

        $update_token = "UPDATE seller SET verify_token='$token' WHERE emailaddress='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run) {

            

            send_password_reset($get_email,$token);
            $_SESSION['status'] = "Password resent link sent";
            header("Location: seller-forgot-password.php");
            exit(0);

        } else {

            $_SESSION['status'] = "Something went wrong";
            header("Location: seller-forgot-password.php");
            exit(0);
                    
        }


              
        
        
    }  else {
        $_SESSION['status'] = "$email_address - Email is not registered. Please Register Now.!";
        header("Location: sellerregistration.php");
        exit(0);
    }
    
        
           
      
                  
    
      
        
    

}


if(isset($_POST['password-update'])) {

    $email_address = mysqli_real_escape_string($con, $_POST['emailaddress']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $repeat_password = mysqli_real_escape_string($con, $_POST['repeat-password']);
    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    $new_password_encryption = password_hash($new_password, PASSWORD_BCRYPT);
    $repeat_password_encryption = password_hash($repeat_password, PASSWORD_BCRYPT);


    if(!empty($token)){

        

        $check_token = "SELECT verify_token from seller WHERE verify_token='$token' LIMIT 1";
        $check_token_run = mysqli_query($con, $check_token);
        
        if(mysqli_num_rows($check_token_run) > 0){

            if($new_password == $repeat_password){

                $update_password = "UPDATE seller SET password='$new_password_encryption' WHERE verify_token='$token' LIMIT 1";
                $update_password_run = mysqli_query($con, $update_password);

                if($update_password_run){

                    $_SESSION['status'] = "New Password Successfully Updated";
                    header("Location: sellerlogin.php");
                    exit(0);

                } else {
                    $_SESSION['status'] = "Something Went Wrong";
                    header("Location: seller-change-password.php?token=$token&email=$email_address");
                    exit(0);
                }

            } else {
                $_SESSION['status'] = "Password and Confirm Password does not match";
                header("Location: seller-change-password.php?token=$token&email=$email_address");
                exit(0);
            }

        } else {
            $_SESSION['status'] = "Invalid Token";
            header("Location: seller-change-password.php?token=$token&email=$email_address");
            exit(0);
        }

      

    } else {
        $_SESSION['status'] = "No Token Available";
        header("Location: seller-change-password.php");
        exit(0);
                    
    }

}

?>
