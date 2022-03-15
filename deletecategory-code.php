<?php 

session_start();

include('dbcon.php');



    

if(isset($_POST['deletecategory'])){


    
    $category_id =  $_SESSION['category_delete_id'];
   

    
    $query = "DELETE from category WHERE category_id=$category_id";
  
    $category_out = mysqli_query($con, $query);

    if($category_out){

        $_SESSION['status'] = "Record deleted successfully.";
        header("Location: view-category.php");
        exit(0);
    } else {

        $_SESSION['status'] = "Something went wrong.";
        header("Location: view-category.php");
        exit(0);
    }


    



}







?>