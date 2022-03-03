
<?php 
session_start();
include("header.php");
?>



<div class="container">
    <div class="row">
        
        <h4>Change Password</h4>

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

            <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>" >
            
            <div class="col-md-12">
                <label for="email_address" class="form-label"></label>
                <input type="email_address" class="form-control" name="email_address" value="<?php if(isset($_GET['email_address'])){echo $_GET['email_address'];} ?>" id="email_address" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                
            </div>
                            

            <div class="col-md-12">
                <label for="password" class="form-label"></label>
                <input type="password" id="password" name="new_password" placeholder="Enter New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>

            <div class="col-md-12">
                <label for="repeat-password" class="form-label"></label>
                <input type="password" id="repeat-password" name="repeat-password" placeholder="Confirm New Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                
            </div>
                            
            <div class="col-12">
                <button name="password-update" type="submit" class="btn btn-primary">Change Password</button>
            </div>

            <div class="col-12">
                <h6> Back to! <a href="sellerlogin.php">Login.</a></h6>
            </div>
        </form>
    </div>
    
</div>

<?php 

include("footer.php");

?>


