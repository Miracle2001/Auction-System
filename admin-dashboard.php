<?php 

include('admin-authentication.php');
include("header.php");
?>



<div class="container-fluid pt-5 p-md-4">

 
     
    <div class="col-12">
      <h2>Admin's Dashboard</h2>
    </div>
    <div>

    <div class="container-fluid">
        <div class="row g-2">
            <div class="col-4">
              <div class="p-4 border bg-light"><a href="add-category.php">Add Category</a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="view-category.php">View Category</a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="view-buyer.php">View Buyer</a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="view-seller.php">View Seller</a></div>
            </div>

            <div class="col-4">
              <div class="p-4 border bg-light"><a href="view-product.php">View Product</a></div>
            </div>
                       
            

           
        
        
                   

        </div>
    </div>
   
  </div>
</div>

<?php 
include("footer.php");
?>

