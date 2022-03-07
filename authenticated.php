<?php 
session_start();



if(!isset($_SESSION['authenticated'])) {

    $_SESSION['status'] = "Please Login or Register to Bid.";
    header('Location: buyerlogin.php');
    exit(0);
} 

?>