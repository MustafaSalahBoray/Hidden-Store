<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../Library/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Style.css">
    <script type="text/javascript" src="../Library/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Library/js/jquery-3.6.1.min.js"></script>
	<title>Dashboard Admin</title>
	<style type="text/css">
		

}
	</style>
</head>
<body>
 <div class="container-fluid"> 


  <?php 
  session_start();
         if (isset($_SESSION['user'])) {
           echo '<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
     <img src="../img/logo.jpeg" class="logo">
     <nav class="navbar navbar-expand-lg ">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link text-light " href="#">'.$_SESSION['user']->UserName.'</a>
        </li> 
            </ul>
        </nav>
          </div>
      </nav>
        <!-- seconed Nav -->
        <div class="bg-light">
          <h3 class=" text-center p-2">Manage Details</h3>
        </div> 
      <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
          <a href=""><img src="../img/'.$_SESSION['user']->Images1.'" class="adimg"></a>
          <p class="text-center text-light">'.$_SESSION['user']->UserName.'</p>
        </div>
        <div class="button text-center">
          <button class="my-3 "><a href="http://localhost/Hidden%20Store/Admin/InsertProduct.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
           <button><a href=" " class="nav-link text-light bg-info my-1">View Products</a></button>
            <button><a href=" http://localhost/Hidden%20Store/Admin/index.php?InsertCatogries" class="nav-link text-light bg-info my-1">Insert Catogries</a></button>
            <button><a href=" " class="nav-link text-light bg-info my-1">View Catogries</a></button>
             <button><a href="http://localhost/Hidden%20Store/Admin/index.php?InsertBrands " class="nav-link text-light bg-info my-1">Insert Brands</a></button>
             <button><a href=" " class="nav-link text-light bg-info my-1">View Brands</a></button>
             <button><a href=" " class="nav-link text-light bg-info my-1">Insert Brands</a></button>
             
                <button><a href=" " class="nav-link text-light bg-info my-1">List users</a></button>
                 <button><a href=" " class="nav-link text-light bg-info my-1">Logout</a></button>
        </div>';
         }
         else{
           echo '<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
     <img src="../img/logo.jpeg" class="logo">
     <nav class="navbar navbar-expand-lg ">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link " href="#">Welcome Guest</a>
        </li> 
            </ul>
        </nav>
          </div>
      </nav>
        <!-- seconed Nav -->
        <div class="bg-light">
          <h3 class=" text-center p-2">Manage Details</h3>
        </div>';
         }
  
  ?>

 
      </div>
      <div class="container-fluid">
         <?php 
            if (isset($_GET['InsertCatogries'])) {
              include 'InsertCatogries.php';
            }
             if (isset($_GET['InsertBrands'])) {
              include 'InsertBrands.php';
            }
     
         ?>
      </div>
      <div class=" text-center bg-info footer p-3 ">
          <hr class="bg-light">
          <p class="mb-0">All Right reverse &copy;</p>
           <p >made by  :❤mustafa salah </p></div>
 </div>
</body>
</html>