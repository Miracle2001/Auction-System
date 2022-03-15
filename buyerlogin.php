<?php 
session_start();
include("header.php");
?>




<div class="container mt-2">
    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="card mt-6" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3> <a class="active text-white" href="buyerlogin.php" >Buyer</a></h3>
                </div>
            </div>
            
        </div>
        <div class="col-md-6 mt-5" >
            <div class="card mt-6" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="seller-header"><a class="text-white" href="sellerlogin.php" style="text-decoration:none;">Seller</a></h3>
                </div>
            </div>
            
        </div>
        
        <?php 
            if(isset($_SESSION['status'])) {
                ?>
                <div class="alert alert-success">
                    <h5><?= $_SESSION['status']; ?></h5>                  

                </div>
                <?php
                unset($_SESSION['status']);
                }
        ?>
       

        <form action="buyerlogin-code.php" method="post" class="row g-3 needs-validation">
            <div class ="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body row">
                        
                        <div class="col-md-12">
                            <label for="emailaddress" class="form-label"></label>
                            <input type="emailaddress" class="form-control" name="emailaddress" id="emailaddress" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                            
                        </div>

                        <div class="col-md-12">
                            <label for="password" class="form-label"></label>
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                            
                        </div>

                        <div class="col-12 mt-2">
                            <h6>  <a href="buyer-forgot-password.php" style="text-decoration:none;">Forgot Password?</a></h6>
                        </div>
                        <div class="col-12 mt-2">
                            <button name="submit" style="background-color:#6E806E;" type="submit" class="btn text-white">Login</button>
                        </div>

                        <div class="col-12 mt-2">
                            <h6> Create Account! <a href="buyerregistration.php" style="text-decoration:none;">Register.</a></h6>
                        </div>
                                                                        
                        



                    </div>
                </div>

                
            </div>
           

            
            </div>
        </form>


    </div>
    



</div>
<?php 
include("footer.php");
?>
   