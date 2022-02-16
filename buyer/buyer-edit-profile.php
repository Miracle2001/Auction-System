
<?php 
session_start();
include("../header.php");
?>




<div class="container">
    <div class="row">
        
        <h4>My Details</h4>

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

      
        
        
        <form action="seller-edit-profile-code.php" method="POST" class="row g-3 needs-validation">

            
            <div class="col-md-12">
                <label for="first_name" class="form-label"></label>
                <input type="first_name" class="form-control" name="first_name" value="<?php if(isset($_GET['first_name'])){echo $_GET['first_name'];} ?>" id="first_name" placeholder="First Name" required>
            </div>
            <div class="col-md-12">
                <label for="last_name" class="form-label"></label>
                <input type="last_name" class="form-control" name="last_name" value="<?php if(isset($_GET['last_name'])){echo $_GET['last_name'];} ?>" id="last_name" placeholder="Last Name" required>
            </div>

            <div class="col-md-12">
                <label for="student_id" class="form-label"></label>
                <input type="student_id" class="form-control" placeholder="Student ID" name="student_id" value="<?php if(isset($_GET['student_id'])){echo $_GET['student_id'];} ?>" id="student_id" required>
            </div>


            <div class="col-md-12">
                <label for="email_address" class="form-label"></label>
                <input type="email_address" class="form-control" name="email_address" value="<?php if(isset($_GET['email_address'])){echo $_GET['email_address'];} ?>" id="email_address" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                
            </div>

            <div class="col-md-12">
                <label for="current_password" class="form-label"></label>
                <input type="password" id="current_password" name="current_password" placeholder="Current Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                    
            </div>

            <div class="col-md-12">
                <label for="new_password" class="form-label"></label>
                <input type="password" id="new_password" name="new_password" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>


           
    

            <div class="col-12">
                <button name="updateprofile" type="submit" class="btn btn-primary">UPDATE PROFILE</button>
            </div>

           

            
        </form>
    </div>
    

</div>
<?php 
include("../footer.php");
?>

