
<?php 
session_start();
include("../header.php");

?>




<div class="container">
    <div class="row">
       
        <h4>Forgot Password</h4>
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
        
        
        <form action="seller-forgot-password-code.php" method="POST" class="row g-3 needs-validation">
           


            <div class="col-md-12">
                <label for="email_address" class="form-label"></label>
                <input type="email_address" class="form-control" name="email_address" id="email_address" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                
            </div>


           
            <div class="col-12">
                <button name="submit" type="submit" class="btn btn-primary">Reset Link</button>
            </div>

            <div class="col-12">
               <h6> Have an account! <a href="sellerlogin.php">Login</a></h6>   
            </div>

            
        </form>
    </div>
    

</div>

<?php 

include("../footer.php");

?>

