
<?php 
session_start();
include('dbcon.php');
include("header.php");
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

      
        
        
        <form action="seller-delete-code.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation">

            <?php 

                if(isset($_GET['deletesellerid'])){
                    $seller_delete_id = $_GET['deletesellerid'];
                    $_SESSION['seller_delete_id'] = $seller_delete_id;
                    $squery = "SELECT * FROM seller WHERE seller_id='$seller_delete_id'";
                    $squery_run = mysqli_query($con,$squery);
                    while($row = mysqli_fetch_array($squery_run)){

                    


            


            ?>
        
            <div class="col-md-12">
                <label for="first_name" class="form-label">First Name</label>
                <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['first_name'];?>" id="first_name"  readonly>
            </div>
            <div class="col-md-12">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="last_name" class="form-control" name="last_name" value="<?php echo $row['last_name'];?>" id="last_name"  readonly>
            </div>

            <div class="col-md-12">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="student_id" class="form-control"  name="student_id" value="<?php echo $row['student_id'];?>" id="student_id" readonly>
            </div>


            <div class="col-md-12">
                <label for="email_address" class="form-label">Email Address</label>
                <input type="email_address" class="form-control" name="email_address" value="<?php echo $row['email_address'];?>" id="email_address"  aria-describedby="emailHelp" readonly>
                
            </div>

            <div class="col-md-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" value="<?php echo $row['password'];?>" class="form-control" aria-describedby="passwordHelpBlock" readonly>
                    
            </div>

           

            <div class="col-md-12">
                <label for="street_address" class="form-label"></label>
                <input type="text" class="form-control" name="street_address" id="street_Saddress" value="<?php echo $row['street_address'];?>" readonly>
            </div>
            
            <div class="col-md-6">
                <label for="county" class="form-label"></label>
                <input type="text" class="form-control" name="county" id="county" value="<?php echo $row['county'];?>" readonly>
            </div>

            <div class="col-md-4">
                <label for="city" class="form-label"></label>
                <input type="text" class="form-control" name="city" id="city" value="<?php echo $row['city'];?>"readonly>
            </div>

                        
            <div class="col-md-2">
                <label for="eircode" class="form-label"></label>
                <input type="text" class="form-control" name="eircode" id="eircode" value="<?php echo $row['eircode'];?>" readonly>
            </div>

            <?php 
                 }
             }
            


            ?>
          
    

            <div class="col-12">
                <button name="sellerdeleteprofile" type="submit" class="btn btn-primary">DELETE PROFILE</button>
            </div>

           

            
        </form>
    </div>
    

</div>


<?php 
include("footer.php");
?>

