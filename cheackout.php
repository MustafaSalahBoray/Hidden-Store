<?php 

require 'DB_connect.php'; 
require 'USERS/Nav1.php';
require 'USERS/Nav2.php';
  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Hidden Store</title>
</head>
<body>

 
  <!-- cheackout  -->
  <div class="container">
     <div class="row px-1">
      <div class="col-md-12">
        <div class="row"> 
          <?php  
         
                if (!isset($_SESSION['USERNAME'])) {
                include 'USERS/users.php';
                }
                else{
                  include 'USERS/payment.php';
                }
  
    
          ?>
          
        </div>
      

  

  </div>  </div></div>
<footer>
  </div>
    <div class="col-md-12 text-center bg-info text-red">
          <hr class="bg-light">
          <p class="mb-0 size">All Right reverse &copy;</p>
           <p class="size">made by  :❤mustafa salah </p>
              <p class="size">made in Years  : 2023-1-7 </p>
    </div>
</div>
  </div>
</footer>
     
</body>
</html>
