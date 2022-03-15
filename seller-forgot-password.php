
<?php 
session_start();
include("header.php");

?>




<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-6" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Forgot Password</h3>
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
       

        <form action="seller-forgot-password-code.php" method="POST" class="row g-3 needs-validation">
            <div class ="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body row">
                        
                        <div class="col-md-12">
                            <label for="emailaddress" class="form-label"></label>
                            <input type="emailaddress" class="form-control" name="emailaddress" id="emailaddress" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                            
                        </div>
                        
                        
                        <div class="col-12 mt-3">
                            <button name="submit" style="background-color:#6E806E;" type="submit" class="btn text-white">Reset Link</button>
                        </div>

                        <div class="col-12 mt-3">
                            <h6> Have an Account! <a href="sellerlogin.php" style="text-decoration:none;">Login.</a></h6>
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

