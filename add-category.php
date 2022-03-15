
<?php 
session_start();
include("header.php");
?>



<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12">
                <div class="card-header">
                    <h4> Add New Product Category</h4>
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
        
        
        <form action="add-category-code.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-12 mt-3">
                            <label for="category_name" class="form-label"></label>
                            <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" required>
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="image">Select image:</label>
                            <input type="file" id="image" class="form-control" name="image" accept="image/*" value="">
                            
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="category_description" class="form-label"></label>
                            <textarea class="form-control" placeholder="Category Description" name="category_description" id="category_description" required rows="3"></textarea>
                            
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

                        <div class="col-12 mt-3">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>


                    </div>
                </div>
            </div>

          
            
                      
                      
            

           

            
        </form>
    </div>
    

</div>

<?php 
include("footer.php");
?>

