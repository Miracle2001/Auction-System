<?php 
session_start();
include("../header.php");
?>



<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3> <a href="buyerregistration.php">Buyer</a></h3>
        </div>
        <div class="col-md-6">
            <h3><a href="../seller/sellerregistration.php">Seller</a></h3>
        </div>
        <h4>Register as a Buyer</h4>

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
        
        <form action="buyerregistrationcode.php" method="post" class="row g-3 needs-validation">
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
                <input type="emailaddress" class="form-control" name="email_address" id="email_address" placeholder="Student Email Address" aria-describedby="emailHelp" required>
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
                <label for="repeat_password" class="form-label"></label>
                <input type="password" id="repeat_password" name="repeat_password" placeholder="Repeat Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                
            </div>

            
            <div class="col-md-12">
                <label for="street_address" class="form-label"></label>
                <input type="text" class="form-control" name="street_address" id="street_Saddress" placeholder="Address" required>
            </div>
            
            <div class="col-md-6">
                <label for="county" class="form-label"></label>
                <input type="text" class="form-control" name="county" id="county" placeholder="County" required>
            </div>

            <div class="col-md-4">
                <label for="city" class="form-label"></label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
            </div>

                        
            <div class="col-md-2">
                <label for="eircode" class="form-label"></label>
                <input type="text" class="form-control" name="eircode" id="eircode" placeholder="Eircode" required>
            </div>

            <div class="col-12">
                <button name="submit" type="submit" class="btn btn-primary">Register</button>
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
      
   