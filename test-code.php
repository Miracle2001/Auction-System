<?php 

session_start();
include('dbcon.php');



if(isset($_POST['submit'])){

    

    

    $product_name = mysqli_real_escape_string($con, $_POST['name']);
   
   
    $start =  $_POST['sd'];
    $kill = strtotime($start);
    $result_date_start = date("Y-m-d H:i:s",  $kill);
    
   
    
   
    
   
    

   
    $query = "INSERT INTO testings(name, kill_me) VALUES ('$product_name', '$result_date_start')";


    $insert_token_run = mysqli_query($con, $query);

   



   

    if($insert_token_run) {

                    
        $_SESSION['status'] = "item has been added";
        header("Location: test.php");
        exit(0);

    } else {

        $_SESSION['status'] = "Something went wrong";
        header("Location: test.php");
        exit(0);
                
    } 
    
      
        
    

}

?>