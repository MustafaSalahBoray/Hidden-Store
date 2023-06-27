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

 
  <!-- Tabels  -->
  <div class="container">
     <div class="row">


  <table class="table table-dark table-hover">
  <thead style="text-align:center;">
    <tr>
      <th scope="col">Project Titel</th>
      <th scope="col">Project Image</th>
      <th scope="col">Total Price</th>
      <th scope="col">Quantite</th>
      <th scope="col">remove</th>
     
    </tr>
  </thead>
  <tbody > 
      <form method="POST"> 
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
              
         
      ?>
       <th scope="row"><?php echo$rowProd->Product_Titel; ?></th>
      <td> <img src="ProductImg/<?php  echo $rowProd->image1;?>" style=" width: 100px;
  height: 100px;
  object-fit: content;"></td>
      <td><?php echo $rowProd->ProductPrice;?></td>

       <td><input class="form-control w-50" name="qyt" type="number"></td>  
      <td><input type="checkbox" name="remove"> </td>
     <td>   <button class="btn btn-info" type="submit" name="updateQuan" value="<?php echo $rowProd->productID;?>" >Update</button>
      <button class="btn btn-danger" type="submit" name="Delete" value="<?php echo $rowProd->productID;?>" >Delete</button></td> 
              <?php 
     if(isset($_POST['updateQuan'])){
       $update=$db->prepare("UPDATE cart_details SET quantite=:QTY WHERE productID=:PU ");
       $update->bindparam("QTY",$_POST['qyt']);
       $update->bindparam("PU",$_POST['updateQuan']);
       $update->execute();
      
       $total=$total*$_POST['qyt']; 
     }
     // Remove Item 
     if (isset($_POST['remove'])) {
         if (isset($_POST['Delete'])) {
           $delte=$db->prepare("DELETE  FROM cart_details WHERE productID=:ID");
           $delte->bindparam("ID",$_POST['Delete']);
           $delte->execute();
         }
     }
    
  
?>
       </tr>
  <?php }}?> 
    </form>
  </tbody>
</table>
  <div class="d-flex">
    <h4 class="px-3">SubTotal<strong class="text-info"><?php echo $total;?></strong></h4>
    <a href="http://localhost/Hidden%20Store/index.php"><button class="btn btn-info px-3">Continue Shopping</button></a>
    <a href="http://localhost/Hidden%20Store/cheackout.php"><button class="btn btn-secondary ml-3 px-3">CheckOut</button></a>
  </div>

  </div>  </div>
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
