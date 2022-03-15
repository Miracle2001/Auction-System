<?php

session_start();
unset($_SESSION['authenticated']);
$_SESSION['status'] ="you are logged out";
header("location:adminlogin.php");


 ?>