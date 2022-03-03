<?php 
session_start();



if(!isset($_SESSION['authenticated'])) {

    $_SESSION['status'] = "Please Login to Access Admin Dashboard.";
    header('Location: adminlogin.php');
    exit(0);
} 

?>