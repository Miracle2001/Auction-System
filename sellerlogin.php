<?php 
session_start();
include("header.php");
?>




<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3><a href="sellerlogin.php">Seller</a></h3>
        </div>
        <div class="col-md-6">
            <h3> <a href="../buyer/buyerlogin.php">Buyer</a></h3>
        </div>
       
        <h4>Seller Login</h4>
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
        
        <form action="sellerlogin-code.php" method="POST" class="row g-3 needs-validation">

        
                        
            
        <div class="col-md-12">
                <label for="email_address" class="form-label"></label>
                <input type="email_address" class="form-control" name="email_address" id="email_address" placeholder="Student Email Address" aria-describedby="emailHelp" required>
            
            </div>

            <div class="col-md-12">
                <label for="password" class="form-label"></label>
                <input type="password" id="password" name="password" placeholder="Password" class="form-control" aria-describedby="passwordHelpBlock" required>
            
            </div>

            <div class="col-12">
            <h6> <a href="seller-forgot-password.php">Forgot Password?</a></h6>
            </div>
                                        
            <div class="col-12">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="col-12">
            <h6> Create Account! <a href="sellerregistration.php">Register.</a></h6>
            </div>

        </form>
    </div>

</div>

<?php 

include("footer.php");

?>

