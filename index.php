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
                        <a class="nav-link" href="#buyerModal" data-bs-toggle="modal" data-bs-target="#buyerModal">Login/Register</a>
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

    <div class=" modal fade" id="sellerModal" tabindex="-1" aria-labelledby="sellerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><a href="#buyerModal">Buyer</a> </h4>
                        </div>
                        <div class="col-md-6">
                            <h4><a href="#sellerModal">Seller</a></h4>
                        </div>
                    </div>
                    <h5>Seller Login</h5>
                    <form class="row g-3">
                        <div class="col-md-12">
                            <label for="inputemail" class="form-label"></label>
                            <input type="email" class="form-control" id="inputemail" placeholder="Student Email Address">
                        </div>
                        <div class="col-md-12">
                            <label for="inputpassword" class="form-label"></label>
                            <input type="password" class="form-control" id="inputpassword" placeholder="Password">
                        </div>


                    </form>


                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary">Login</button>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary">Register as a Seller</button>
                    </div>


                </div>
            </div>
        </div>
    </div>





    <!-- Modal -->
    <div class=" modal fade" id="buyerModal" tabindex="-1" aria-labelledby="buyerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4><a href="#buyerModal">Buyer</a> </h4>
                        </div>
                        <div class="col-md-6">
                            <h4><a href="#sellerModal">Seller</a></h4>
                        </div>
                    </div>
                    <h5>Buyer Login</h5>
                    <form class="row g-3">
                        <div class="col-md-12">
                            <label for="inputemail" class="form-label"></label>
                            <input type="email" class="form-control" id="inputemail" placeholder="Student Email Address">
                        </div>
                        <div class="col-md-12">
                            <label for="inputpassword" class="form-label"></label>
                            <input type="password" class="form-control" id="inputpassword" placeholder="Password">
                        </div>


                    </form>


                </div>
                <div class="modal-footer">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-secondary">Login</button>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary">Register as a buyer</button>
                    </div>


                </div>
            </div>
        </div>
    </div>



    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="fff.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="fff.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="fff.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid pt-5 p-md-4">
        <h1>Upcoming Auction</h1>
        <div class="row gap-5">
            <div class="col p-3 bg-primary text-white">.col</div>
            <div class="col p-3 bg-dark text-white">.col</div>
            <div class="col p-3 bg-primary text-white">.col</div>
        </div>

        <div class="row gap-5">
            <div class="col p-3 bg-dark text-white">.col</div>
            <div class="col p-3 bg-dark text-white">.col</div>
            <div class="col p-3 bg-primary text-white">.col</div>
        </div>

        <div class="row gap-5">
            <div class="col p-3 bg-primary text-white">.col</div>
            <div class="col p-3 bg-dark text-white">.col</div>
            <div class="col p-3 bg-primary text-white">.col</div>
        </div>

        <div class="row gap-5">
            <div class="col p-3 bg-primary text-white">.col</div>
            <div class="col p-3 bg-dark text-white">.col</div>
            <div class="col p-3 bg-primary text-white">.col</div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
            <a href="#" class="btn btn-primary">View all upcoming auction</a>
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