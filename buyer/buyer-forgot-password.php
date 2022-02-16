
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
        
        
        <form action="buyer-forgot-password-code.php" method="POST" class="row g-3 needs-validation">
           


            <div class="col-md-12">
                <label for="emailaddress" class="form-label"></label>
                <input type="emailaddress" class="form-control" name="emailaddress" id="emailaddress" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                
            </div>


           
            <div class="col-12">
                <button name="submit" type="submit" class="btn btn-primary">Reset Link</button>
            </div>

            <div class="col-12">
               <h6> Have an account! <a href="buyerlogin.php">Login</a></h6>   
            </div>

            
        </form>
    </div>
    

</div>

<?php 
include("../footer.php");
?>
   
