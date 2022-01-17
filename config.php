<?php

$conn = mysqli_connect("localhost", "root", "", "auction");

if (!$conn) {
    echo "Connection Failed";
}