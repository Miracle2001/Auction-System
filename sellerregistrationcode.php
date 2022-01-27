<?php 

session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


function sendemail_verify($first_name,$email_address,$verify_token){
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
        $mail->addAddress($email_address);     //Add a recipient
                             

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Email Verification from Eauction';
        $email_template ="
            <h2> You have registered with Eauction </h2>
            <h5>Verify your email address to Login with the below given link </h5>
            <br/><br/>
            <a href='http://localhost/php/seller-verify-email.php?token=$verify_token'> Click Me </a>
        ";
        $mail->Body = $email_template;
        

        $mail->send();
        echo 'Message has been sent';
    

}

if(isset($_POST['submit'])){
    $first_name = mysqli_real_escape_string($con, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($con, $_POST['lastname']);
    $student_id = mysqli_real_escape_string($con, $_POST['studentid']);
    $email_address = mysqli_real_escape_string($con, $_POST['emailaddress']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($con, $_POST['repeat-password']);
    $verify_token = mysqli_real_escape_string($con, md5(rand()));

    $password_encryption = password_hash($password, PASSWORD_BCRYPT);
    $repeat_password_encryption = password_hash($repeat_password, PASSWORD_BCRYPT);
    
    
    

    $check_email_query = "SELECT emailaddress FROM seller WHERE emailaddress='$email_address' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    $check_studentid_query = "SELECT studentid FROM seller WHERE studentid=' $student_id' LIMIT 1";
    $check_studentid_query_run = mysqli_query($con, $check_studentid_query);

    if(mysqli_num_rows($check_email_query_run) > 0){

        $_SESSION['status'] = "Email ID already exists";
        header("Location: sellerregistration.php");

    } elseif(mysqli_num_rows($check_studentid_query_run) > 0) {

        $_SESSION['status'] = "Student ID already exists";
        header("Location: sellerregistration.php");

    } else {
        if(strlen($student_id) == 8){

            if(str_ends_with($email_address, 'studentmail.ul.ie')) {

                if(strpos( $email_address, $student_id ) === 0){
                    $query = "INSERT INTO seller (firstname, lastname, studentid, emailaddress, password, verify_token) VALUES ('{$first_name}', '{$last_name}', '{$student_id}', '{$email_address}', '{$password_encryption}', '{$verify_token}')";
                    $query_run = mysqli_query($con, $query);

                    if($query_run) {

                        sendemail_verify("$first_name", "$email_address", "$verify_token");
                        $_SESSION['status'] = "Registration Successful, please verify your email address.";
                        header("Location: sellerregistration.php");
            
                    } else {
                        $_SESSION['status'] = "Registration Failed";
                        header("Location: sellerregistration.php");
                    
                
                    }
                } else {
                    $_SESSION['status'] = "The Student ID doesn't match the student email address.";
                    header("Location: sellerregistration.php");
                }

            } else {
                $_SESSION['status'] = "Register with your student email.";
                header("Location: sellerregistration.php");
            }

        }else {

            $_SESSION['status'] = "Register with the right Student ID.";
            header("Location: sellerregistration.php");

        }
    } 
    
        
           
      
                  
    
      
        
    

}

?>