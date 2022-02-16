<?php 
include("header.php")
?>

<div class="container">
    <h1>Contact Us</h1>
    <form>
        <div class="mb-3">
            <label for="firstname" class="form-label"></label>
            <input type="firstname" class="form-control" id="firstname" placeholder="First Name">

        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label"></label>
            <input type="lastname" class="form-control" id="lastname" placeholder="Last Name">

        </div>
        <div class="mb-3">
            <label for="studentid" class="form-label"></label>
            <input type="studentid" class="form-control" id="studentid"  placeholder="Student ID">

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"></label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address" aria-describedby="emailHelp">

        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"></label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>

<?php 
include("footer.php")
?>