<?php 
session_start();
include("header.php");
?>


<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-6" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Change Password</h3>
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
       

        <form action="buyer-forgot-password-code.php" method="POST" class="row g-3 needs-validation">
            <div class ="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body row">
                        <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>" >
                        <div class="col-md-12">
                            <label for="emailaddress" class="form-label"></label>
                            <input type="emailaddress" class="form-control" name="emailaddress" value="<?php if(isset($_GET['emailaddress'])){echo $_GET['emailaddress'];} ?>" id="emailaddress" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                            
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
                                    
                        
                        <div class="col-12 mt-3">
                            <button name="password-update" style="background-color:#6E806E;" type="submit" class="btn text-white">Change Password</button>
                        </div>

                        <div class="col-12 mt-3">
                            <h6> Back to! <a href="buyerlogin.php" style="text-decoration:none;">Login.</a></h6>
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


    