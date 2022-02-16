
<?php 
session_start();
include("../header.php");

?>







<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3><a href="sellerregistration.php">Seller</a></h3>
        </div>
        <div class="col-md-6">
           <h3> <a href="../buyer/buyerregistration.php">Buyer</a></h3>
        </div>
        
        <h4>Register as a Seller</h4>
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
        
        
        <form action="sellerregistrationcode.php" method="POST" class="row g-3 needs-validation">
            <div class="col-md-6">
                <label for="first_name" class="form-label"></label>
                <input type="first_name" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label"></label>
                <input type="last_name" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
            </div>

            <div class="col-md-6">
                <label for="student_id" class="form-label"></label>
                <input type="student_id" class="form-control" placeholder="Student ID" name="student_id" id="student_id" required>
            </div>


            <div class="col-md-12">
                <label for="email_address" class="form-label"></label>
                <input type="email_address" class="form-control" name="email_address" id="email_address" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>


            <div class="col-md-6">
                <label for="password" class="form-label"></label>
                <input type="password" id="password" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>

            <div class="col-md-6">
                <label for="repeat-password" class="form-label"></label>
                <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                
            </div>

            <div class="col-12">
                <button name="submit" type="submit" class="btn btn-primary">Register</button>
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




