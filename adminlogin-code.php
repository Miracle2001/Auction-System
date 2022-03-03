<?php 

session_start();
include('dbcon.php');
if(isset($_POST['submit'])){

    if(!empty(trim( $_POST['user_name'])) && !empty(trim( $_POST['password']))){
        $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $admin_search = "SELECT * FROM admin WHERE user_name='$user_name' AND password='$password'";
        $admin_search_query_run = mysqli_query($con, $admin_search);

        $admin_count = mysqli_num_rows($admin_search_query_run);

        if($admin_count) {
            
            $admin_pass = mysqli_fetch_assoc($admin_search_query_run);
                   

            if($admin_pass['verify_status'] == "1"){

                $_SESSION['authenticated'] = TRUE;

                $admin_id = $admin_pass['admin_id'];
                $_SESSION["admin_id"] = $admin_id;
            
                $_SESSION['status'] = "You are logged in successfully.";

                
               
              

                header("Location: admin-dashboard.php");
             
                exit(0);
            }


            
            

        }
        

    }else{
        $_SESSION['status'] = "All fields are Mandatory";
        header("Location: adminlogin.php");
        exit(0);
    }

    

}


?>