<?php 

include('seller-authentication.php');
?>

<!doctype html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Seller's Registration Page</title>
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

<div class="container-fluid pt-5 p-md-4">

 
  
    
    <div class="col-12">
      <h2>Seller's Dashboard</h2>
    </div>
    <div>

    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-4">
              <div class="p-4 border bg-light">Post Listing</div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light">Product List</div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light">Selling/Sold</div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light">Messages</div>
            </div>

            <h5>Seller_ID: <?= $_SESSION['auth_user']['email_address']; ?></h5>

            <div class="col-4">
              <div class="p-4 border bg-light"> Edit Profile Information </div>
                

              
            </div>

           
        
        
                   

        </div>
    </div>
   
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