<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "auction";

$con = mysqli_connect($server, $user, $password, $db);

if($con) {
    ?> 
        
      
    <?php
    
} else {
    ?> 
        <script>
            alert("No Connection");
        </script>
      
    <?php
}


?>