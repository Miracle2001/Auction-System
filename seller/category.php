
<?php 
session_start();
include('../dbcon.php');
include("../header.php");

?>



<div class="container">
    
        
    <h4>Select A Category</h4>

    <table class="table">

        <?php 
            $category_query ="SELECT * FROM category WHERE status='Active'";
            $category_query_run = mysqli_query($con,$category_query);
            $category_query_run_check = mysqli_num_rows($category_query_run);

            if ($category_query_run_check > 0){
                while ($row = mysqli_fetch_assoc($category_query_run)) {
                    #echo $row['category_name'];

                   
                    
                    
                   

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
       
        
