<?php

session_start();
unset($_SESSION['authenticated']);
unset($_SESSION['id']);
unset($_SESSION['cat_id']);
$_SESSION['status'] ="you are logged out";
header("location:sellerlogin.php");


 ?>