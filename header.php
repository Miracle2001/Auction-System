<!doctype html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>

    <!--First navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
        <div class="container-fluid">
            
            <a class="navbar-brand" href="index.php">Eauction</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="contactus.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="faq.php">FAQ</a>
                    </li>

                   
                    
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Register</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./buyer/buyerregistration.php">Buyer</a></li>
                            <li><a class="dropdown-item" href="./seller/sellerregistration.php">Seller</a></li>
                        
                        </ul>
                    </li>
                    <div class="vr"></div>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./buyer/buyerlogin.php">Buyer</a></li>
                            <li><a class="dropdown-item" href="./seller/sellerlogin.php">Seller</a></li>
                            
                        </ul>
                   </li>


                   <li class="nav-item">
                       <a class="nav-link" href="./seller-logout.php">Logout</a>
                    </li>


                </ul>
                
            </div>
        </div>
    </nav>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>