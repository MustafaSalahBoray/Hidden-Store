<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	 <link rel="stylesheet" type="text/css" href="PayPalCSs.css">
  <script type="text/javascript" src=".../Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Library/js/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>MY STORE</title>
</head>
<body> 
	  <?php  
            require '../DB_connect.php';
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
              }};
              $selecyquant=$db->prepare("SELECT * FROM cart_details ");
               $selecyquant->execute();
            $selecyquant=$selecyquant->fetchObject();
           $quant=$selecyquant->quantite;
           if ($quant==0) {
               $quant=1;
               $subTotal=$total;
           }
           else{
            $quant=$quant;
           }
      ?>

</body>
</html>