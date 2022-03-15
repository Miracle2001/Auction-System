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
                    <h3 class="text-white">View Category</h3>
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
                <form action="view-category-code.php" method="post">
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                
                                <th scope="col" style="text-align:center">Category Name</th>
                                <th scope="col" style="text-align:center">Category Image</th>
                                <th scope="col" style="text-align:center">Category Description</th>
                                <th scope="col" style="text-align:center">Status</th>
                                <th scope="col" style="text-align:center">Action</th>
                                
                                
                            </tr>
                        </thead>

                        <?php 
            
                

                            $category_query ="SELECT * FROM category";
                            $category_query_run = mysqli_query($con,$category_query);
                            $category_query_run_check = mysqli_num_rows($category_query_run);

                            if ($category_query_run_check > 0){
                                while ($row = mysqli_fetch_assoc($category_query_run)) {

                                    //$d_buyer_id = $row['buyer_id'];    
                                    $edit_category_id = $row['category_id'];  
                                    
                                
                                    
                                    
                                

                                    ?>
                                    <tr>
                                        <td> <h6 class="text-center"><?php  echo $row['category_name']?> </h6></td>
                                        <td> <?php   echo '<img src="data:image;base64,'.base64_encode($row['cat_image']).'" alt="Image" style="width: 180px; height: 180px;">'?> </td>
                                        <td> <h6 class="text-center"><?php  echo $row['cate_description']?> </h6></td>
                                        <td> <h6 class="text-center"><?php  echo $row['status']?> </h6> </td>
                                        
                                        <td> 
                                            
                                            <button class="btn" style="background-color:#6E806E;"><a class="text-white" style="text-decoration:none;" href="view-category-profile.php?categoryeditid=<?php echo $edit_category_id; ?>">Edit</a></button>
                                            <button class="btn btn-danger"><a class="text-white" style="text-decoration:none;" href="deletecategory.php?categorydeleteid=<?php echo $edit_category_id; ?>">Delete</a></button>
                                        </td>
                                        
                                    
                                        
                                    </tr>

                                    <?php

                                

                                
                                

                                }
                            }
                        ?>


                    </table>

                </form>
        




                </div>
                
            </div>
        </div>

      
    </div>





    </div>

    
        
    

</div>


<?php 
include("footer.php");
?>