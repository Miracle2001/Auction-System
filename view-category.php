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

    <form action="view-category-code.php" method="post">
        <table class="table">
            <thead>
                <tr>
                    
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Category Description</th>
                    
                    
                </tr>
            </thead>

            <?php 
            
                

                $category_query ="SELECT * FROM category WHERE status='Active'";
                $category_query_run = mysqli_query($con,$category_query);
                $category_query_run_check = mysqli_num_rows($category_query_run);

                if ($category_query_run_check > 0){
                    while ($row = mysqli_fetch_assoc($category_query_run)) {

                        //$d_buyer_id = $row['buyer_id'];    
                        $edit_category_id = $row['category_id'];  
                        
                       
                        
                        
                    

                        ?>
                        <tr>
                            <td> <?php  echo $row['category_name']?> </td>
                            <td> <?php  echo $row['last_name']?> </td>
                            <td> <?php  echo $row['cate_description']?> </td>
                            
                            <td> 
                                
                                <button class="btn btn-info"><a href="view-category-profile.php?categoryeditid=<?php echo $edit_category_id; ?>">Edit</a></button>
                                <button class="btn btn-danger"><a href="view-buyer.php?buyerdid=<?php echo $d_buyer_id; ?>">Delete</a></button>
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