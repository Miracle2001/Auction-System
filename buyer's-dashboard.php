<?php 
include('buyer-authentication.php');
include("header.php");
?>






<div class="container-fluid pt-5 p-md-4">
    <h1>Buyer's Dashboard</h1>
    
    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-4">
              <div class="p-4 border bg-light"><a href="items-display.php">View Online Auction</a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="seller-product-list.php">Watch List</a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light">Biddings</div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light">Messages</div>
            </div>

            

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="buyer-edit-profile.php"> Edit Profile Information</a> </div>
                

              
            </div>
   
</div>

<?php 
include("footer.php");
?>
   


