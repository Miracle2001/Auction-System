
<?php 
session_start();
include("header.php");
include('dbcon.php');

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

      
        
        
        <form action="buyer-edit-profile-code.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation">

            <?php
                $current_user = $_SESSION["buyer_id"];
                $check_email_query = "SELECT * FROM buyer WHERE buyer_id='$current_user' LIMIT 1";
                $check_email_query_run = mysqli_query($con, $check_email_query);
                while($row = mysqli_fetch_array($check_email_query_run)){
            ?>

            
            <div class="col-md-12">
                <label for="first_name" class="form-label">First Name</label>
                <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['first_name'];?>" id="first_name"  required>
            </div>
            <div class="col-md-12">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="last_name" class="form-control" name="last_name" value="<?php echo $row['last_name'];?>" id="last_name" placeholder="Last Name" required>
            </div>

            <div class="col-md-12">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="student_id" class="form-control"  name="student_id" value="<?php echo $row['student_id'];?>" id="student_id" required>
            </div>


            <div class="col-md-12">
                <label for="email_address" class="form-label"> Student Email Address</Address></label>
                <input type="email_address" class="form-control" name="email_address" value="<?php echo $row['email_address'];?>" id="email_address"  aria-describedby="emailHelp" required>
                
            </div>

            <div class="col-md-12">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" placeholder="Current Password" class="form-control" aria-describedby="passwordHelpBlock" required>
                    
            </div>

            <div class="col-md-12">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" id="new_password" name="new_password" placeholder="New Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" aria-describedby="passwordHelpBlock" required>
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                </div>
            </div>

            <div class="col-md-12">
                <label for="street_address" class="form-label">Street Address</label>
                <input type="text" class="form-control" name="street_address" value="<?php echo $row['street_address'];?>" id="street_address"  required>
            </div>
            
            <div class="col-md-6">
                <label for="county" class="form-label"> County</label>
                <input type="text" class="form-control" name="county" value="<?php echo $row['county'];?>" id="county"  required>
            </div>

            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" name="city" value="<?php echo $row['city'];?>" id="city"  required>
            </div>

                        
            <div class="col-md-2">
                <label for="eircode" class="form-label">Eircode</label>
                <input type="text" class="form-control" name="eircode" value="<?php echo $row['eircode'];?>" id="eircode"  required>
            </div>

            <?php 
                 }
             
            


            ?>


            

            <div class="col-12">
                <button name="updateprofile" type="submit" class="btn btn-primary">UPDATE PROFILE</button>
            </div>

           

            
        </form>
    </div>
    

</div>

<?php 
include("footer.php");
?>

