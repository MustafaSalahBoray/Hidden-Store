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
	<title>Hidden Store</title>
    <style type="text/css">
    .card{
  width:100%;
  height: 100%;
  object-fit: contain;
}
  </style>
</head>
<body>
 
  <!-- Carts  -->
 <div class="row">
      <div class="col-md-10">
            <div class="row ">
         
          <?php 
    
                
                     $showProduct=$db->prepare("SELECT * FROM products  ");
             $showProduct->execute();
             foreach ($showProduct as $key) { 
 
                      echo '<div class="col-md-4 mb-2">
                       <div class="card">
            <img src="ProductImg/'.$key['image1'].'" className="card-img-top" alt="mm"   />
            <div class="card-body">
              <h5 class="card-title">'.$key['Product_Titel'].'</h5>
              <p class="card-text">
                '.$key['Product_Desc'].'
              </p>
              <p class="card-text">
                '.$key['ProductPrice'].'
              </p>
              
              <a href="#" class="btn btn-info">Add to Cart  </a>
                <a href="http://localhost/Hidden%20Store/projectID.php?productID='.$key['productID'].'" class="btn btn-secondary">View More! </a>
            </div> 
        </div> </div>';

     }
      
              if (isset($_GET['catogrey'])) {

             $showProduct=$db->prepare("SELECT * FROM products  WHERE CatogryID=:cat  ");
             $showProduct->bindparam("cat",$_GET['catogrey']);
             $showProduct->execute();
             foreach ($showProduct as $key) { 

                      echo '<div class="col-md-4 mb-2">
                       <div class="card">
            <img src="ProductImg/'.$key['image1'].'" className="card-img-top" alt="mm"   />
            <div class="card-body">
              <h5 class="card-title">'.$key['Product_Titel'].'</h5>
              <p class="card-text">
                '.$key['Product_Desc'].'
              </p>
              <p class="card-text">
                '.$key['ProductPrice'].'
              </p>
              <a href="#" class="btn btn-info">Add to Cart  </a>
              <a href="http://localhost/Hidden%20Store/projectID.php?='.$key['productID '].'" class="btn btn-secondary">View More! </a>
            </div> 
        </div> </div>';

     }
      } 
                if (isset($_GET['Brands'])) {

             $SHOE=$db->prepare("SELECT * FROM products  WHERE BrandsID =:BRAN  ");
             $SHOE->bindparam("BRAN",$_GET['Brands']);
             $SHOE->execute();
             foreach ($SHOE as $key) { 

                      echo '<div class="col-md-4 mb-2">
                       <div class="card">
            <img src="ProductImg/'.$key['image1'].'" className="card-img-top" alt="mm"   />
            <div class="card-body">
              <h5 class="card-title">'.$key['Product_Titel'].'</h5>
              <p class="card-text">
                '.$key['Product_Desc'].'
              </p>
              <p class="card-text">
                '.$key['ProductPrice'].'
              </p>
              <a href="#" class="btn btn-info">Add to Cart  </a>
              <a href="http://localhost/Hidden%20Store/projectID.php?projectID='.$key['productID'].'" class="btn btn-secondary">View More! </a>
            </div> 
        </div> </div>';

     }
      }


          ?>

        </div> 
      </div>
      <div class="col-md-2 bg-secondary p-0">
       <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <!-- Brands Display -->
          <a class="nav-link text-light" href="#"><h4>Delivery Brands</h4></a>
        </li>
         <?php 
             $showPrand=$db->prepare("SELECT * FROM brands");
             $showPrand->execute();
             foreach ($showPrand as $key) {
              echo ' <li class="nav-item ">
          <a class="nav-link text-light" href="http://localhost/Hidden%20Store/?Brands='.$key['Brands_id'].'">'.$key['Brands_titel'].'</a>
        </li>';
             }
            
         ?>
      
       </ul>
       <!-- Catogry Display -->
              <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <!-- Brands Display -->
          <a class="nav-link text-light" href="#"><h4>Categories</h4></a>
        </li>
            <?php 
             $showCatogrey=$db->prepare("SELECT * FROM catogries  ");
             $showCatogrey->execute();
             foreach ($showCatogrey as $key) {
              echo ' <li class="nav-item ">
          <a class="nav-link text-light" href="http://localhost/Hidden%20Store/?catogrey='.$key['CatogryID'].'">'.$key['Catogray_Titel'].'</a>
        </li>';
             }
            
         ?>

       </ul>
      </div>
 </div>
    
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
