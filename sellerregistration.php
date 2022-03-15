
<?php 
session_start();
include("header.php");

?>

<br><br>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="card mt-6" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3> <a class="active text-white" href="sellerregistration.php">Seller</a></h3>
                </div>
            </div>
            
        </div>
        <div class="col-md-6 mt-5" >
            <div class="card mt-6" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="seller-header"><a class="text-white"  href="buyerregistration.php" style="text-decoration:none;">Buyer</a></h3>
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
       

        <form action="sellerregistrationcode.php" method="post" class="row g-3 needs-validation">
            <div class ="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body row">
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
                            <input type="text" class="form-control" name="street_address" id="street_address" placeholder="Address" required>
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

                        
                        <div class="col-12 mt-2">
                            <button name="submit" style="background-color:#6E806E;" type="submit" class="btn text-white">Register</button>
                        </div>
                        <div class="col-12 mt-2">
                            <h6> Have an account! <a href="sellerlogin.php" style="text-decoration:none;">Login</a></h6>
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




