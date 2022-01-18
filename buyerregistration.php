
<?php

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';


    include 'config.php';
    $msg ="";

    if(isset($_POST['submit'])){
        $first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
        $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
        $student_id = mysqli_real_escape_string($conn, $_POST['studentid']);
        $email_address = mysqli_real_escape_string($conn, $_POST['emailaddress']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $repeat_password = mysqli_real_escape_string($conn, md5($_POST['repeat-password']));
        $street_address = mysqli_real_escape_string($conn, $_POST['streetaddress']);
        $county = mysqli_real_escape_string($conn, $_POST['county']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $eircode = mysqli_real_escape_string($conn, $_POST['eircode']);
        $code = mysqli_real_escape_string($conn, md5(rand()));

        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM buyer WHERE emailaddress='{$email_address}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email_address} - This email address has been already exists.</div>";
        } else {
            if ($password === $repeat_password) {
                $sql = "INSERT INTO buyer (firstname, lastname, studentid, emailaddress, password, streetaddress, county, city, eircode, code) VALUES ('{$first_name}', '{$last_name}', '{$student_id}', '{$email_address}', '{$password}', '{$street_address}', '{$county}', '{$city}', '{$eircode}', '{$code}')";
                $result = mysqli_query($conn, $sql);

                if ($result){

                    echo "<div style='display: none;'>";

                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'ifechi.ugwu@gmail.com';                     //SMTP username
                        $mail->Password   = 'Auction@1960';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('ifechi.ugwu@gmail.com', 'Mailer');
                        $mail->addAddress($email_address);     //Add a recipient
                                             

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'No reply';
                        $mail->Body    = 'Here is the verification link <b><a href="http://localhost/php/?verification='.$code.'">http://localhost/php/?verification='.$code.'</a></b>';
                        

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    $msg = "<div class='alert alert-info'>We have sent a verification link to your email address.</div>";

                } else{
                    $msg = "<div class='alert alert-danger'>Something went wrong.</div>";

                }

            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
                
            }
        }

    }     

?>


<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home Page</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-md-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Eauction</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login page.html">Login/Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Admin Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
               <h3> <a href="buyerregistration.html">Buyer</a></h3>
            </div>
            <div class="col-md-6">
                <h3><a href="sellerregistration.html">Seller</a></h3>
            </div>
            <h4>Register as a Buyer</h4>
            <?php echo $msg; ?>
            <form action="" method="post" class="row g-3">
                <div class="col-md-6">
                    <label for="firstname" class="form-label"></label>
                    <input type="firstname" class="form-control" name="firstname" id="firstname" placeholder="First Name">
                </div>
                <div class="col-md-6">
                    <label for="lastname" class="form-label"></label>
                    <input type="lastname" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
                </div>

                <div class="col-md-6">
                    <label for="studentid" class="form-label"></label>
                    <input type="studentid" class="form-control" placeholder="Student ID" name="studentid" id="studentid">
                </div>

    
                <div class="col-md-12">
                    <label for="emailaddress" class="form-label"></label>
                    <input type="emailaddress" class="form-control" name="emailaddress" id="emailaddress" placeholder="Student Email Address" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>


                <div class="col-md-6">
                    <label for="password" class="form-label"></label>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" aria-describedby="passwordHelpBlock">
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="repeat-password" class="form-label"></label>
                    <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat Password" class="form-control" aria-describedby="passwordHelpBlock">
                    <div id="passwordHelpBlock" class="form-text">
                        Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                    </div>
                </div>

               
                <div class="col-md-12">
                    <label for="streetaddress" class="form-label"></label>
                    <input type="text" class="form-control" name="streetaddress" id="streetaddress" placeholder="Address">
                </div>
                
                <div class="col-md-6">
                    <label for="county" class="form-label"></label>
                    <input type="text" class="form-control" name="county" id="county" placeholder="County">
                </div>

                <div class="col-md-4">
                    <label for="city" class="form-label"></label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                </div>

                         
                <div class="col-md-2">
                    <label for="eircode" class="form-label"></label>
                    <input type="text" class="form-control" name="eircode" id="eircode" placeholder="Eircode">
                </div>

                <div class="col-12">
                    <button name="submit" type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
        



    </div>


    <footer class="bg-dark text-white pt-5 pb-4">

        <div class="container text-center text-md-left">

            <div class="row text-center text-md-left">

                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Company Name</h5>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                        ital consectetur lorem ipsum dolor sit amet adipisicing elit.
                    </p>

                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> TheProviders</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Creativity</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> SourceFiles</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> bootstrap 5 alpha</a>
                    </p>

                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful links</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Your Account</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Become an Affiliates</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;">Shipping Rates</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none;"> Help</a>
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                    <p>
                        <i class="fas fa-home mr-3"></i>New York, NY 2333, US
                    </p>
                    <p>
                        <i class="fas fa-envelope mr-3"></i>theproviders98@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i>+92 3162859445
                    </p>
                    <p>
                        <i class="fas fa-print	 mr-3"></i>+01 335 633 77
                    </p>
                </div>

            </div>

            <hr class="mb-4">

            <div class="row align-items-center">

                <div class="col-md-7 col-lg-8">
                    <p>
                        Copyright ©2020 All rights reserved by:
                        <a href="#" style="text-decoration: none;">
                            <strong class="text-warning">The Providers</strong>
                        </a>
                    </p>

                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-right">

                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>