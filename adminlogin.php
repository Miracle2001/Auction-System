<?php 
session_start();
include("header.php");
?>


<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Admin Login</h3>
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

        <form action="adminlogin-code.php" method="POST" class="row g-3 needs-validation">
            <div class ="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-12 mt-2">
                            <label for="user_name" class="form-label"></label>
                            <input type="user_name" class="form-control" name="user_name" id="user_name" placeholder="User Name" aria-describedby="emailHelp" required>
                            
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="password" class="form-label"></label>
                            <input type="password" id="password" name="password" placeholder="Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                            
                        </div>

                        <div class="col-md-12 mt-2">
                            <button name="submit" type="submit" style="background-color:#6E806E;" class="btn text-white">Login</button>
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



