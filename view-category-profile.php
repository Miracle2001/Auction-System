
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
                    <h4>Edit Category</h4>
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
                    <form action="view-category-profile-code.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation">
                        <?php 

                            if(isset($_GET['categoryeditid'])){
                                $categoryedit_id = $_GET['categoryeditid'];
                                $_SESSION['category_edit_id'] = $categoryedit_id;
                                $query = "SELECT * FROM category WHERE category_id='$categoryedit_id'";
                                $query_run = mysqli_query($con,$query);
                                while($row = mysqli_fetch_array($query_run)){

                                





                        ?>

                        <div class="col-md-12">
                            <label for="first_name" class="form-label">Category Name</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['category_name'];?>" id="first_name"  required>
                        </div>

                        <div class="col-md-12">
                            <label for="first_name" class="form-label">Category Description</label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo $row['cate_description'];?>" id="first_name"  required>
                        </div>


                        <?php 
                                }
                            }
                            


                        ?>

                        <div class="col-md-12 mt-3">
                            <label for="image">Select image:</label>
                            <input type="file" id="image" class="form-control" name="image" accept="image/*" value="">
                            
                        </div>

                        <div class="col-md-12 mt-3">
                            <select name="status" id="status" class="form-control">
                                <option value=''>Select Status</option>
                                <?php
                                $arr = array("Active","Inactive");
                                foreach($arr as $val)
                                {
                                    if($val == $rsedit['status'])
                                    {
                                    echo "<option value='$val' selected>$val</option>";
                                    }
                                    else
                                    {
                                    echo "<option value='$val'>$val</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <button name="updatecategoryprofile" type="submit" class="btn btn-primary">Update Category Information</button>
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

