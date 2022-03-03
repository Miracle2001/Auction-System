<?php 

include('seller-authentication.php');
include("header.php");
?>



<div class="container-fluid pt-5 p-md-4">

 
     
    <div class="col-12">
      <h2>Seller's Dashboard</h2>
    </div>
    <div>

    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-4">
              <div class="p-4 border bg-light"><a href="category.php">Post Listing</a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="seller-product-list.php">Product List </a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light">Selling/Sold</div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light">Messages</div>
            </div>

            

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="seller-edit-profile.php"> Edit Profile Information</a> </div>
                

              
            </div>

           
        
        
                   

        </div>
    </div>
   
  </div>
</div>

<?php 
include("footer.php");
?>

