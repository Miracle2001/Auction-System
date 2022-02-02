<?php 

session_start();
include('../dbcon.php');


if(isset($_POST['updateprofile'])){

    $first_name = mysqli_real_escape_string($con, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($con, $_POST['lastname']);
    $student_id = mysqli_real_escape_string($con, $_POST['studentid']);
    $email_address = mysqli_real_escape_string($con, $_POST['emailaddress']);
    
    $verify_token = mysqli_real_escape_string($con, md5(rand()));

    
    $new_password_encryption = password_hash($new_password, PASSWORD_BCRYPT);

   
    

}







?>