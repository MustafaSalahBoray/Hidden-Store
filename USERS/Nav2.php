<!-- Seconed Nav -->
    
 <?php 
 $username="mostafa";
  $pass="123";
  $db=new PDO("mysql:host=Localhost;dbname=mystore;Charset=utf8;",$username,$pass); 
   
   session_start(); 
    if (isset($_SESSION['user'])) {
       echo '  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
          <li class="nav-item">
          <img src="img/'.$_SESSION['user']->user_image.'" class="logo" style="width: 100px;
  height: 100px;">
        </li>
          <li class="nav-item">
          <a class="nav-link text-light " href="#">'.$_SESSION['user']->USERNAME.'</a>
        </li>
         <li class="nav-item">
          <a class="nav-link text-light text-center " href="http://localhost/Hidden%20Store/USERS/Profile.php"> Profile</a>
        </li>
      </ul>
  </nav>
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is at the Heart of E-commerce And Community</p>
  </div> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
    }  
    else {
       echo '<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
          <li class="nav-item">
          <a class="nav-link " href="#">Welcome Guest</a>
        </li>
          <li class="nav-item">
          <a class="nav-link " href="http://localhost/Hidden%20Store/USERS/users.php">Login</a>
        </li>
      </ul>
  </nav>
  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is at the Heart of E-commerce And Community</p>
  </div> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> ';
    }
    

 

 ?>
 
   <!--   -->