<?php 

session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';


function sendemail_verify($first_name,$email_address,$verify_token){
    $mail = new PHPMailer(true);

    
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "eauction13@gmail.com";                     //SMTP username
        $mail->Password   = "Auction@2022";                              //SMTP password
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
            <a href='http://localhost/php/buyer/buyer-verify-email.php?token=$verify_token'> Click Me </a>
        ";
        $mail->Body = $email_template;
        

        $mail->send();
        echo 'Message has been sent';
    

}

if(isset($_POST['submit'])){
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $email_address = mysqli_real_escape_string($con, $_POST['email_address']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($con, $_POST['repeat_password']);
    $street_address = mysqli_real_escape_string($con, $_POST['street_address']);
    $county = mysqli_real_escape_string($con, $_POST['county']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $eircode = mysqli_real_escape_string($con, $_POST['eircode']);
    $verify_token = mysqli_real_escape_string($con, md5(rand()));

    $password_encryption = password_hash($password, PASSWORD_BCRYPT);
    $repeat_password_encryption = password_hash($repeat_password, PASSWORD_BCRYPT);
    
    
    

    $check_email_query = "SELECT email_address FROM buyer WHERE email_address='$email_address' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    $check_studentid_query = "SELECT student_id FROM buyer WHERE student_id=' $student_id' LIMIT 1";
    $check_studentid_query_run = mysqli_query($con, $check_studentid_query);

    if(mysqli_num_rows($check_email_query_run) > 0){

        $_SESSION['status'] = "Email ID already exists";
        header("Location: buyerregistration.php");

    } elseif(mysqli_num_rows($check_studentid_query_run) > 0) {

        $_SESSION['status'] = "Student ID already exists";
        header("Location: buyerregistration.php");

    } else {
        if(strlen($student_id) == 8){

            if(str_ends_with($email_address, 'studentmail.ul.ie')) {

                if(strpos( $email_address, $student_id ) === 0){
                    $sql = "INSERT INTO buyer (first_name, last_name, student_id, email_address, password, street_address, county, city, eircode, verify_token) VALUES ('{$first_name}', '{$last_name}', '{$student_id}', '{$email_address}', '{$password_encryption}', '{$street_address}', '{$county}', '{$city}', '{$eircode}', '{$verify_token}')";
                    $query_run = mysqli_query($con, $sql);

                    if($query_run) {

                        sendemail_verify("$first_name", "$email_address", "$verify_token");
                        $_SESSION['status'] = "Registration Successful, please verify your email address.";
                        header("Location: buyerregistration.php");
            
                    } else {
                        $_SESSION['status'] = "Registration Failed";
                        header("Location: buyerregistration.php");
                    
                
                    }
                } else {
                    $_SESSION['status'] = "The Student ID doesn't match the student email address.";
                    header("Location: buyerregistration.php");
                }

            } else {
                $_SESSION['status'] = "Register with your student email.";
                header("Location: buyerregistration.php");
            }

        }else {

            $_SESSION['status'] = "Register with the right Student ID.";
            header("Location: buyerregistration.php");

        }
    } 
    
        
           
      
                  
    
      
        
    

}

?>