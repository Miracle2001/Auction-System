<?php 
session_start();
include("header.php");
include('dbcon.php');

?>

<div id="carouselExampleIndicators" class="carousel slide"    data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="back1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-flex h-75 align-itmems-center justify-content-center d-md-block" style="font-size:25px;">
            <h1 class="ml16 text-white">Online Auction</h1>
            <script>
                var textWrapper = document.querySelector('.ml16');
                textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

                anime.timeline({loop: true})
                    .add({
                        targets: '.ml16 .letter',
                        translateY: [-100,0],
                        easing: "easeOutExpo",
                        duration: 1400,
                        delay: (el, i) => 30 * i
                    }).add({
                        targets: '.ml16',
                        opacity: 0,
                        duration: 1000,
                        easing: "easeOutExpo",
                        delay: 1000
                });
            </script>
            <a class="btn text-white" style="background-color:#6E806E;" href="items-display.php" role="button">Click to Browse Catalogue</a>
                
        </div>
    </div>
    <div class="carousel-item">
      <img src="back2 .jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-flex h-75 align-itmems-center justify-content-center d-md-block" style="font-size:25px;">
            <h1 class="ml16 text-white">Online Auction</h1>
            <script>
               var textWrapper = document.querySelector('.ml16');
                textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

                anime.timeline({loop: true})
                    .add({
                        targets: '.ml16 .letter',
                        translateY: [-100,0],
                        easing: "easeOutExpo",
                        duration: 1400,
                        delay: (el, i) => 30 * i
                    }).add({
                        targets: '.ml16',
                        opacity: 0,
                        duration: 1000,
                        easing: "easeOutExpo",
                        delay: 1000
                });
            </script>
            <a class="btn text-white " style="background-color:#6E806E;" href="items-display.php" role="button">Click to Browse Catalogue</a>
                
        </div>
    </div>
    <div class="carousel-item">
      <img src="back3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-flex h-75 align-itmems-center justify-content-center d-md-block" style="font-size:25px;">
            <h1 class="ml16 text-white">Online Auction</h1>
            <script>
                var textWrapper = document.querySelector('.ml16');
                textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

                anime.timeline({loop: true})
                    .add({
                        targets: '.ml16 .letter',
                        translateY: [-100,0],
                        easing: "easeOutExpo",
                        duration: 1400,
                        delay: (el, i) => 30 * i
                    }).add({
                        targets: '.ml16',
                        opacity: 0,
                        duration: 1000,
                        easing: "easeOutExpo",
                        delay: 1000
                });
            </script>
            <a class="btn text-white" style="background-color:#6E806E;" href="items-display.php" role="button">Click to Browse Catalogue</a>
                
        </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<br><br>

<div class="container-fluid">
    <div class="row">
        <h4> Latest Auction </h4>
        <?php 
       




            date_default_timezone_set('Europe/Dublin');
            $date = date('Y-m-d H:i:s'); 
            $query = "select * from stock WHERE status='Active'";
            $query_run = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($query_run))

            {   
                $stock_id = $row['stock_id'];
                $_SESSION['stock_id'] = $stock_id;

                
                

                
                            

                
        ?>

        

        

        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body row">

                    <div class="col-md-12 mt-3">
                        <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Product Name: <?php echo $row['stock_name']; ?> </h4>
                    </div>


                    <div class="col-md-12 mt-3">
                        <h5>Current Bid: £<?php echo $row['current_bid']; ?> </h4>
                    </div>

                    
                    

                    <div class="col-md-12 mt-3">
                    
                        <button class="btn btn-info"><a href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                        <button class="btn btn-info"><a href="view-seller-profile.php?sellereditid=<?php echo $edit_seller_id;?>">Watch this item</a></button>
                    </div>

                        
                                    


                </div>
            </div>
        </div>



        <?php 
                }
            
        ?>
    </div>
</div>

<br><br>

<div class="container-fluid">
    <div class="row">
        <h4> Upcoming Auction </h4>
        <?php 
       




            date_default_timezone_set('Europe/Dublin');
            $date = date('Y-m-d H:i:s'); 
            $query = "select * from stock WHERE status='Inactive'";
            $query_run = mysqli_query($con,$query);
            while($row = mysqli_fetch_array($query_run))

            {   
                $stock_id = $row['stock_id'];
                $_SESSION['stock_id'] = $stock_id;

                
                

                
                            

                
        ?>

        

        

        <div class="col-md-4 mt-3">
            <div class="card">
                <div class="card-body row">

                    <div class="col-md-12 mt-3">
                        <?php  echo '<img src="data:image;base64,'.base64_encode($row['stock_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>Product Name: <?php echo $row['stock_name']; ?> </h4>
                    </div>


                    <div class="col-md-12 mt-3">
                        <h5>Current Bid: £<?php echo $row['current_bid']; ?> </h4>
                    </div>

                    
                    

                    <div class="col-md-12 mt-3">
                    
                        <button class="btn btn-info"><a href="single-product.php?stockid=<?php echo $stock_id;?>">Place Bid</a></button>
                        <button class="btn btn-info"><a href="view-seller-profile.php?sellereditid=<?php echo $edit_seller_id;?>">Watch this item</a></button>
                    </div>

                        
                                    


                </div>
            </div>
        </div>



        <?php 
                }
            
        ?>
    </div>
</div>



<?php 
include("footer.php")
?>