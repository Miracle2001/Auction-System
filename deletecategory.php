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
                    <h3 class="text-white">Category Information</h3>
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
                    <form action="deletecategory-code.php" method="post" enctype="multipart/form-data" class="row g-3 needs-validation">
                    <?php 

                        if(isset($_GET['categorydeleteid'])){
                            $categorydelete_id = $_GET['categorydeleteid'];
                            $_SESSION['category_delete_id'] = $categorydelete_id;
                            $query = "SELECT * FROM category WHERE category_id='$categorydelete_id'";
                            $query_run = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($query_run)){

                           
                                





                    ?>

                    <div class="col-md-12 mt-2">
                        <label for="cate_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="cate_name" value="<?php echo $row['category_name'];?>" id="first_name"  readonly>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="cate_desc" class="form-label">Category Description</label>
                        <input type="text" class="form-control" name="cate_desc" value="<?php echo $row['cate_description'];?>" id="first_name"  readonly>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="cate_image" class="form-label">Category Image</label>
                        <?php  echo '<img src="data:image;base64,'.base64_encode($row['cat_image']).'" alt="Image" style="width:100%; height: 280px;">'?>
                    </div>

                    <div class="col-md-12 mt-2">
                        <label for="cate_desc" class="form-label">Category Status</label>
                        <input type="text" class="form-control" name="cate_desc" value="<?php echo $row['status'];?>" id="first_name"  readonly>
                    </div>



                    <?php 
                            }
                        }
                        


                    ?>
                    <div class="col-12">
                            <button name="deletecategory" style="background-color:#6E806E;" type="submit" class="btn text-white">Delete Category Information</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>



    </div>
</div>