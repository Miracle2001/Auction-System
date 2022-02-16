<?php 

session_start();
include('../dbcon.php');


if(isset($_POST['submit'])){


    $filename = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    

    $category_name = mysqli_real_escape_string($con, $_POST['category_name']);
    $category_description = mysqli_real_escape_string($con, $_POST['category_description']);
    $category_status =  $_POST['status'];


    $query = "INSERT INTO category(category_name, cat_image, cate_description, status) VALUES ('{$category_name}', '{$filename}', '{$category_description}', '{$category_status}')";


    $insert_token_run = mysqli_query($con, $query);

   

    if($insert_token_run) {

                    
        $_SESSION['status'] = "Category has been added";
        header("Location: add-category.php");
        exit(0);

    } else {

        $_SESSION['status'] = "Something went wrong";
        header("Location: add-category.php");
        exit(0);
                
    }
    
    
    
   

    
    
    
        
           
      
                  
    
      
        
    

}

?>