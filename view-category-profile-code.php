<?php 

session_start();

include('dbcon.php');


$category_id = $_SESSION['category_edit_id'];
 

if(isset($_POST['updatecategoryprofile'])){

   


    $filename = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $category_status =  $_POST['status'];
    
   

    
    $update_category = "UPDATE category SET cat_image='$filename', status='$category_status' WHERE category_id='$category_id' LIMIT 1";
    $update_category_run = mysqli_query($con, $update_category);

    if($update_category_run) {

                    
        $_SESSION['status'] = "Category has been updated";
        header("Location: view-category.php");
        exit(0);

    } else {

        $_SESSION['status'] = "Something went wrong";
        header("Location: view-category-profile.php");
        exit(0);
                
    }


}







?>