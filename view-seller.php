<?php 
session_start();
include('dbcon.php');
include("header.php");
?>
<div class="container">
    
        
    <h4>Select A Category</h4>
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

    <form action="#" method="post">
        <table class="table">
            <thead>
                <tr>
                    
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Street Address</th>
                    <th scope="col">County</th>
                    <th scope="col">City</th>
                    <th scope="col">Eircode</th>
                    <th scope="col">Action</th>
                    
                </tr>
            </thead>

            <?php 
            
                

                $seller_query ="SELECT * FROM seller WHERE verify_status= 1";
                $seller_query_run = mysqli_query($con,$seller_query);
                $seller_query_run_check = mysqli_num_rows($seller_query_run);

                if ($seller_query_run_check > 0){
                    while ($row = mysqli_fetch_assoc($seller_query_run)) {

                        $delete_seller_id = $row['seller_id'];    
                        $edit_seller_id = $row['seller_id'];  
                        
                       
                        
                        
                    

                        ?>
                        <tr>
                            <td> <?php  echo $row['first_name']?> </td>
                            <td> <?php  echo $row['last_name']?> </td>
                            <td> <?php  echo $row['student_id']?> </td>
                            <td> <?php  echo $row['email_address']?> </td>
                            <td> <?php  echo $row['street_address']?> </td>
                            <td> <?php  echo $row['county']?> </td>
                            <td> <?php  echo $row['city']?> </td>
                            <td> <?php  echo $row['eircode']?> </td>
                            <td> 
                                
                                <button class="btn btn-info"><a href="view-seller-profile.php?sellereditid=<?php echo $edit_seller_id;?>">Edit</a></button>
                                <a class='btn btn-danger' href="seller-delete.php?deletesellerid=<?php echo $delete_seller_id;?>">Delete</a>
                            </td>
                            
                        
                            
                        </tr>

                        <?php

                    

                    
                    

                    }
                }
            ?>


    
            
        </table>
   
    </form>

</div>


<?php 
include("footer.php");
?>