<?php 

session_start();
include('dbcon.php');

if(isset($_POST['submit'])){

    $new_bid = mysqli_real_escape_string($con, $_POST['bid']);
    $stock_id = $_SESSION['stock_id'];

    $query_stock = "select * from stock WHERE status='Active' AND stock_id='$stock_id'";
    $query_run_stock = mysqli_query($con,$query_stock);
    while($row = mysqli_fetch_array($query_run_stock)){

        $current_bid = $row['current_bid'];
    }

    if($new_bid > $current_bid){

        $update_token = "UPDATE stock SET current_bid='$new_bid' WHERE status='Active' AND stock_id='$stock_id'";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run) {

            $_SESSION['status'] = "Your bid has been placed";
            header("Location: bid.php?stockid=$stock_id");
            exit(0);

        } else {
            $_SESSION['status'] = "Something went wrong";
            header("Location: bid.php?stockid=$stock_id");
            exit(0);
        }


    }else {

        $_SESSION['status'] = "Bid higher than the current bid";
        header("Location: bid.php?stockid=$stock_id");
        exit(0);
    }

}

?>