
<?php 
session_start();
include('dbcon.php');
include("header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Edit Seller Profile</h3>
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

        <div class ="col-md-12 mt-3">
            <div class="card">
                <div class="card-body row">
                    <form action="view-seller-profile-code.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation">
                        <?php 

                            if(isset($_GET['sellereditid'])){
                                $selleredit_id = $_GET['sellereditid'];
                                $_SESSION['seller_edit_id'] = $selleredit_id;
                                $query = "SELECT * FROM seller WHERE seller_id='$selleredit_id'";
                                $query_run = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($query_run)){

                            





                        ?>
                        
                        <div class="col-md-12 mt-2">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['first_name'];?>" id="first_name"  readonly>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="last_name" class="form-control" name="last_name" value="<?php echo $row['last_name'];?>" id="last_name"  readonly>
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="student_id" class="form-label">Student ID</label>
                            <input type="student_id" class="form-control"  name="student_id" value="<?php echo $row['student_id'];?>" id="student_id" readonly>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="email_address" class="form-label">Email Address</label>
                            <input type="email_address" class="form-control" name="email_address" value="<?php echo $row['email_address'];?>" id="email_address"  aria-describedby="emailHelp" readonly>
                            
                        </div>

                        <div class="col-md-12 mt-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" value="<?php echo $row['password'];?>" class="form-control" aria-describedby="passwordHelpBlock" readonly>
                                
                        </div>

                        <?php 
                                }
                            }
                                    


                        ?>
                        <div class="col-md-12 mt-2">
                            <label for="street_address" class="form-label"></label>
                            <input type="text" class="form-control" name="street_address" id="street_Saddress" placeholder="Address" required>
                        </div>
                        
                        <div class="col-md-6 mt-2">
                            <label for="county" class="form-label"></label>
                            <input type="text" class="form-control" name="county" id="county" placeholder="County" required>
                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="city" class="form-label"></label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" required>
                        </div>
                        <div class="col-md-2 mt-2">
                            <label for="eircode" class="form-label"></label>
                            <input type="text" class="form-control" name="eircode" id="eircode" placeholder="Eircode" required>
                        </div>
                    
                

                        <div class="col-12 mt-2">
                            <button name="updateprofile" type="submit" style="background-color:#6E806E;" class="btn text-white">Update Seller Profile</button>
                        </div>




                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>





<?php 
include("footer.php");
?>

