
<?php 
session_start();
include('dbcon.php');
include("header.php");

?>


<div class="container mt-2">
  <div class="row">

    <div class="col-md-12 mt-5">
      <div class="card mt-12" style="background-color:#6E806E;">
        <div class="card-header text-center">
          <h3 class="text-white">Select Category</h3>
        </div>
      </div>
    </div>
    <table class="table">

        <?php 
            $category_query ="SELECT * FROM category WHERE status='Active'";
            $category_query_run = mysqli_query($con,$category_query);
            $category_query_run_check = mysqli_num_rows($category_query_run);

            if ($category_query_run_check > 0){
                while ($row = mysqli_fetch_assoc($category_query_run)) {

                    ?>
                    <th>
                        <div class="col-md-12 mt-3">
                            <div class="card">
                                <div class="card-body row">
                                    <div class ="container-fluid" onclick='window.location=`seller-listing.php?categoryid=<?php echo $row['category_id']; ?>`' style="Cursor:pointer;"
                                        <td> 
                                            <div class="col-md-12 mt-2">
                                                <?php  echo '<img src="data:image;base64,'.base64_encode($row['cat_image']).'" alt="Image" style="width: 100%; height: 280px;">'?>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                               <h6>Category Name: <?php  echo $row['category_name']?> </h6>
                                            </div>
                                            <div class="col-md-12 mt-2">
                                               <h6>Category Description: <?php  echo $row['cate_description']?> </h6>
                                            </div>
                                        
                                        </td>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        
                        
                    </th>

                    <?php

                  

                
                

                }
            }
        ?>
                    
                

        
        
        
                
            
       

                    
                    

                    
                        
                                    


               
            
      

    </table>
    



    
    

   
  </div>
 
   
</div>

    
        
    
   

</div>

<?php 
include("footer.php");
?>
       
        
