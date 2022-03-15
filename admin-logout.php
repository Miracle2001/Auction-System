<?php

session_start();
unset($_SESSION['authenticated']);
unset($_SESSION['admin_id']);
$_SESSION['status'] ="You are logged out";
header("location:adminlogin.php");


 ?>