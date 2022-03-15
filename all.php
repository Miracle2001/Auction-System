
<?php 
session_start();

include("header.php");

?>


<button id="demo" type="submit" class="btn btn-primary" onclick="myFunction('Watching')">Watch this product</button>



<script>
function myFunction(col) {
  
  document.getElementById("demo").textContent = col;
  sessionStorage.setItem('col1', col);
}

myFunction(sessionStorage.getItem('col1'));
</script>


