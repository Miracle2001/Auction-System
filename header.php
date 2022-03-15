
<!doctype html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body class="d-flex flex-column min-vh-100">

    <!--First navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #283428;" id="navvv"> 
        <div class="container-fluid">
            
            <a class="navbar-brand" href="index.php">
                <img src="Eauction.png" alt="..." height="80" width="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if(!isset($_SESSION['authenticated'])) : ?>
                    <li class="nav-item">
                       <a class="nav-link active px-2" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link text-white px-3" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link text-white px-3" href="contactus.php">Contact Us</a>
                    </li>
                    

                   
                    
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown text-white px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Register</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-white" href="buyerregistration.php">Buyer</a></li>
                            <li><a class="dropdown-item text-white" href="sellerregistration.php">Seller</a></li>
                        
                        </ul>
                    </li>
                   
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item text-white" href="buyerlogin.php">Buyer</a></li>
                            <li><a class="dropdown-item text-white" href="sellerlogin.php">Seller</a></li>
                            
                        </ul>
                   </li>

                    <?php endif ?>

                   


                   


                </ul>

                <ul class="navbar-nav "> 
                    <?php if( (isset($_SESSION['id']))) :?>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="seller-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="seller-logout.php">Logout</a>
                    </li>
                    

                    <?php endif ?>

                    <?php if( (isset($_SESSION['buyer_id']))) :?>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="buyer's-dashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="buyer-logout.php">Logout</a>
                    </li>

                    <?php endif ?>

                    <?php if( (isset($_SESSION['admin_id']))) :?>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin-dashboard.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="admin-logout.php">Logout</a>
                    </li>

                    <?php endif ?>

                    

                </ul>
                
            </div>
        </div>
    </nav>

    
   
    

    

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
