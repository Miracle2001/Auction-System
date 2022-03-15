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
                    <h3 class="text-white">View Buyer's Information</h3>
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
                <table class="table mt-5">
                        <thead>
                            <tr>
                                
                                <th scope="col" style="text-align:center">First Name</th>
                                <th scope="col" style="text-align:center">Last Name</th>
                                <th scope="col" style="text-align:center">Student ID</th>
                                <th scope="col" style="text-align:center">Email Address</th>
                                <th scope="col" style="text-align:center">Street Address</th>
                                <th scope="col" style="text-align:center">County</th>
                                <th scope="col" style="text-align:center">City</th>
                                <th scope="col" style="text-align:center">Eircode</th>
                                <th scope="col" style="text-align:center">Action</th>
                                
                                
                            </tr>
                        </thead>

                        <?php 
            
                

                            $buyer_query ="SELECT * FROM buyer WHERE verify_status= 1";
                            $buyer_query_run = mysqli_query($con,$buyer_query);
                            $buyer_query_run_check = mysqli_num_rows($buyer_query_run);

                            if ($buyer_query_run_check > 0){
                                while ($row = mysqli_fetch_assoc($buyer_query_run)) {

                                    $delete_buyer_id = $row['buyer_id'];    
                                    $edit_buyer_id = $row['buyer_id'];  
                                    
                                
                                    
                                    
                                

                                    ?>
                                    <tr>
                                        <td><h6> <?php  echo $row['first_name']?></h6> </td>
                                        <td><h6> <?php  echo $row['last_name']?></h6> </td>
                                        <td><h6> <?php  echo $row['student_id']?></h6> </td>
                                        <td><h6> <?php  echo $row['email_address']?></h6> </td>
                                        <td><h6> <?php  echo $row['street_address']?></h6> </td>
                                        <td><h6> <?php  echo $row['county']?></h6> </td>
                                        <td><h6> <?php  echo $row['city']?></h6> </td>
                                        <td><h6> <?php  echo $row['eircode']?></h6> </td>
                                        
                                        <td> 
                                            
                                            <div class="container">
                                                <button class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="view-buyer-profile.php?buyereditid=<?php echo $edit_buyer_id; ?>">Edit</a></button>
                                            </div>
                                            <div class="container mt-2">
                                                <button class="btn btn-danger"><a class="text-white" style="text-decoration:none;" href="buyer-delete.php?deletebuyerid=<?php echo $delete_buyer_id; ?>"> Delete</a></button>
                                            </div>
                                            
                                            
                                        </td>
                                        
                                    
                                        
                                    </tr>

                                    <?php

                                

                                
                                

                                }
                            }
                        ?>


                    </table>

                </div>
            </div>
        </div>




    </div>
</div>

<?php 
include("footer.php");
?>