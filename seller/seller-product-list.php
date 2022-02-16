<?php 
session_start();
include('../dbcon.php');
include("../header.php");
?>
<div class="container">
    
        
    <h4>Select A Category</h4>

    <table class="table">

        <?php 
          
            $current_user =  $_SESSION["id"];

            $product_query ="SELECT * FROM items WHERE seller_id='$current_user'";
            $product_query_run = mysqli_query($con,$product_query);
            $product_query_run_check = mysqli_num_rows($product_query_run);

            if ($product_query_run_check > 0){
                while ($row = mysqli_fetch_assoc($product_query_run)) {
                    

                   
                    
                    
                   

                    ?>
                    <th>
                        <div class ="container-fluid" onclick='window.location=`seller-listing.php?categoryid=<?php echo $row['category_id']; ?>`' style="Cursor:pointer;"
                            <td> <?php  echo '<img src="data:image;base64,'.base64_encode($row['cat_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                                <?php  echo $row['category_name']?> <br> <br>
                                <?php  echo $row['cate_description']?> 
                            
                            </td>
                        </div>
                        
                    </th>

                    <?php

                  

                
                

                }
            }
        ?>


  
        
    </table>
   

</div>

<?php 
include("../footer.php");
?>