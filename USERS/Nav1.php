 
	   <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
     <img src="./img/logo.jpeg" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/Hidden%20Store/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Hidden%20Store/Displayall.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/Hidden%20Store/USERS/usersRegistration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Contact</a>
        </li>
         <li class="nav-item">
          <a class="nav-link " href="http://localhost/Hidden%20Store/cart.php"><i class="fa-solid fa-cart-shopping"> </i> <sup>
            <?php 
            if (isset($_GET['AddtoCar'])) { 
              $ip_server = $_SERVER['SERVER_ADDR'];
               $selecyCart=$db->prepare("SELECT * FROM cart_details ");
        
               $selecyCart->execute();
               $num=$selecyCart->rowcount();
               echo $num;} 
            ?>

          </sup></a>
        </li>
         <li class="nav-item">
          <a class="nav-link " href="#">Total Price :
              <?php 
               $total=0;
              $ip_server =$_SERVER['SERVER_ADDR'];
               $selecyCart=$db->prepare("SELECT * FROM cart_details ");
                $selecyCart->execute();
              while ($row= $selecyCart->fetchObject()) {
                         $productID=$row->productID;
                         $selecyproduct=$db->prepare("SELECT * FROM products WHERE productID=:PP ");
                         $selecyproduct->bindparam("PP",$productID);
                         $selecyproduct->execute();
              while ($rowProd=$selecyproduct->fetchObject()) {
                         $productPrice=array($rowProd->ProductPrice);
                         $productValue=array_sum($productPrice); 
                         $total+=$productValue;
              }
                           }
                   echo $total;
            ?>
 
             
          </a>
        </li>

      </ul>
    
    </div>
      <form class="d-flex"   >
      	 <input type="search"  class="form-control me-2" placeholder="search" aria-label="search" name="search">
      	 <button class="btn btn-outline-light" type="submit" name="searchbtn">search</button>
      </form>
  </div>
</div>
</nav>