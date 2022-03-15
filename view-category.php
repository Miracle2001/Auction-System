<?php 
session_start();
include('dbcon.php');
include("header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12">
                <div class="card-header">
                    <h4>View Category</h4>
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
                    <table class="table">
                        <thead>
                            <tr>
                                
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Image</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                
                                
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
                                        <td> <?php  echo $row['category_name']?> </td>
                                        <td> <?php   echo '<img src="data:image;base64,'.base64_encode($row['cat_image']).'" alt="Image" style="width: 180px; height: 180px;">'?> </td>
                                        <td> <?php  echo $row['cate_description']?> </td>
                                        <td> <?php  echo $row['status']?> </td>
                                        
                                        <td> 
                                            
                                            <button class="btn btn-info"><a href="view-category-profile.php?categoryeditid=<?php echo $edit_category_id; ?>">Edit</a></button>
                                            <button class="btn btn-danger"><a href="deletecategory.php?categorydeleteid=<?php echo $edit_category_id; ?>">Delete</a></button>
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