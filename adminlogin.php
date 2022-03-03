<?php 
session_start();
include("header.php");
?>




<div class="container">
    <div class="row">
        
        <h4>Admin Login</h4>
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
        
        <form action="adminlogin-code.php" method="POST" class="row g-3 needs-validation">

            
                            
            
            <div class="col-md-12">
                <label for="user_name" class="form-label"></label>
                <input type="user_name" class="form-control" name="user_name" id="user_name" placeholder="User Name" aria-describedby="emailHelp" required>
                
            </div>

            <div class="col-md-12">
                <label for="password" class="form-label"></label>
                <input type="password" id="password" name="password" placeholder="Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                
            </div>

            
                                        
            <div class="col-12">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>

            

        </form>
    </div>
    
</div>

<?php 
include("footer.php");
?>



