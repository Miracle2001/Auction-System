<?php

session_start();
unset($_SESSION['authenticated']);
unset($_SESSION['buyer_id']);

$_SESSION['status'] ="you are logged out";
header("location:buyerlogin.php");


 ?>