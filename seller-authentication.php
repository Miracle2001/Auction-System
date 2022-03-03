<?php 
session_start();



if(!isset($_SESSION['authenticated'])) {

    $_SESSION['status'] = "Please Login to Access Seller's Dashboard.";
    header('Location: sellerlogin.php');
    exit(0);
} 

?>