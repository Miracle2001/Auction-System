<?php 

session_start();
include('dbcon.php');



if(isset($_GET['stockid'])){

   
    $stock_id = $_GET['stockid'];
    $buyer_id = $_SESSION['buyer_id'];
    
    
  
    
    $watchquery = "INSERT INTO watchlist (stock_id, buyer_id) VALUES ('{$stock_id}', '{$buyer_id}')";
    $watchquery_run = mysqli_query($con, $watchquery);

    if($watchquery_run) {

       
        $_SESSION['status'] = "Items has been added to the watch list.";
        header("Location: items-display.php");

    } else {
        $_SESSION['status'] = " Failed";
        header("Location: items-display.php");
    

    }


       
        
           
      
                  
    
      
        
    

}

?>