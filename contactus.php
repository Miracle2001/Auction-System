
<?php 

include("header.php");

?>

<br><br>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mt-12" style="background-color:#6E806E;">
                <div class="card-header text-center">
                    <h3 class="text-white">Contact Us</h3>
                </div>
            </div>
            
        </div>
        
        
        
       

        <form>
            <div class ="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label"></label>
                            <input type="first_name" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label"></label>
                            <input type="last_name" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="student_id" class="form-label"></label>
                            <input type="student_id" class="form-control" placeholder="Student ID" name="student_id" id="student_id" required>
                        </div>
                        <div class="col-md-12">
                            <label for="email_address" class="form-label"></label>
                            <input type="emailaddress" class="form-control" name="email_address" id="email_address" placeholder="Student Email Address" aria-describedby="emailHelp" required>
                            
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1"  rows="5"></textarea>
                        </div>
                        
                        
                        

                        
                        <div class="col-12 mt-2">
                            <button name="submit" style="background-color:#6E806E;" type="submit" class="btn text-white">Submit</button>
                        </div>
                        



                    </div>
                </div>

                
            </div>
           

            
            </div>
        </form>


    </div>
    



</div>




<?php 

include("footer.php");

?>




