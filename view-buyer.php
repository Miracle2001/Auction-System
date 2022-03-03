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
            
                

                $buyer_query ="SELECT * FROM buyer WHERE verify_status= 1";
                $buyer_query_run = mysqli_query($con,$buyer_query);
                $buyer_query_run_check = mysqli_num_rows($buyer_query_run);

                if ($buyer_query_run_check > 0){
                    while ($row = mysqli_fetch_assoc($buyer_query_run)) {

                        $delete_buyer_id = $row['buyer_id'];    
                        $edit_buyer_id = $row['buyer_id'];  
                        
                       
                        
                        
                    

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
                                
                                <button class="btn btn-info"><a href="view-buyer-profile.php?buyereditid=<?php echo $edit_buyer_id; ?>">Edit</a></button>
                                <a class='btn btn-danger' href="buyer-delete.php?deletebuyerid=<?php echo $delete_buyer_id; ?>"> Delete</a>
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