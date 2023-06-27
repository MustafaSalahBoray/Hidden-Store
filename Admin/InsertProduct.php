<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="../Library/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Style.css">
    <script type="text/javascript" src="../Library/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Library/js/jquery-3.6.1.min.js"></script>
	<title>Insert Product</title>
</head>
<body class="bg-light">
    <div class="container">
    	<h1 class="text-center ">Insert Product</h1>
    	<!-- Form --> 
    	<form method="POST" enctype="multipart/form-data">
    		<div class="form-outline mb-4">
    			<label for="Product_Titel" class="form-label">Product Titel</label>
    			<input type="text" name="Product_Titel" id="Product_Titel" placeholder="Enter Product title" class="form-control" autocomplete="off">
    		</div>
    		<!-- Discription  -->
    		<div class="form-outline mb-4">
    			<label for="Discription" class="form-label">Product Discription</label>
    			<input type="text" name="Discription" id="Discription" placeholder="Enter Product Discription" class="form-control" autocomplete="off">
    		</div>
    		<!-- KeyWord -->
    		<div class="form-outline mb-4">
    			<label for="KeyWord" class="form-label">Product KeyWord</label>
    			<input type="text" name="KeyWord" id="KeyWord"placeholder="Enter Product KeyWord" class="form-control" autocomplete="off">
    		</div>
    		<!-- Select catogries -->
    		<div class="form-outline mb-4">
    			  <select name="select_Catog" class="form-control">
    			  	<option> Select a Catogries</option>
    			  	<?php 
    			  	      require '../DB_connect.php';
    			  	        $show=$db->prepare("SELECT * FROM catogries ");
                             $show->execute();
                             foreach ($show as $key ) {
                             	echo '<option value='.$key['CatogryID'].'>'. $key['Catogray_Titel'].'</option>'; 
                             }
    			  	 ?>
    			  </select>
    		</div>
    		<!-- select Brands -->
    		<div class="form-outline mb-4">
    			  <select name="select_brand" class="form-control">
    			  	<option> Select a Brands</option>
    			  	<?php 
    			  	      require '../DB_connect.php';
    			  	        $show=$db->prepare("SELECT * FROM brands  ");
                             $show->execute();
                             foreach ($show as $key ) {
                             	echo '<option value='.$key['Brands_id'].'>'. $key['Brands_titel'].'</option>'; 
                             }
    			  	 ?>
    			  </select>
    		</div>
    		<!-- Images1 -->
             <div class="form-outline mb-4 " >
    			<label for="Images1" class="form-label">Product Images1</label>
    			<input type="file" name="Images1" id="Images1" class="form-control">
    		</div>
    		<!-- Images2 -->
    		 <div class="form-outline mb-4 " >
    			<label for="Images2" class="form-label">Product Images2</label>
    			<input type="file" name="Images2" id="Images2" class="form-control">
    		</div>
    		<!-- Images3 -->
    		<div class="form-outline mb-4 " >
    			<label for="Images3" class="form-label">Product Images3</label>
    			<input type="file" name="Images3" id="Images3" class="form-control">
    		</div>
    		<!-- Price -->
    			<div class="form-outline mb-4">
    			<label for="Price" class="form-label">Product Price</label>
    			<input type="text" name="Price" id="Price" placeholder="Enter Product Price" class="form-control" autocomplete="off">
    		</div>
    		<div class="form-outline mb-4">
    		<button type="submit" name="submit" class="btn btn-info mb-3 px-3">Insert Product</button>
         	</div>
    	</form>
    </div>
</body>
</html>
<?php 
    if (isset($_POST['submit'])) {
      $Product_Titel=$_POST['Product_Titel'];
      $Discription=$_POST['Discription'];
      $KeyWord=$_POST['KeyWord'];
      $select_Catog=$_POST['select_Catog'];
      $select_brand=$_POST['select_brand'];
      $Price=$_POST['Price'];
    
      // image 
        $Images1=$_FILES['Images1']['name'];
        $Images2=$_FILES['Images2']['name'];
       $Images3=$_FILES['Images3']['name'];
       // Access Image
        $tmp_Images1=$_FILES['Images1']['tmp_name'];
        $tmp_Images2=$_FILES['Images2']['tmp_name'];
        $tmp_Images3=$_FILES['Images3']['tmp_name']; 

            move_uploaded_file($tmp_Images1,"../ProductImg/$Images1");
            move_uploaded_file($tmp_Images2,"../ProductImg/$Images2");
            move_uploaded_file($tmp_Images3,"../ProductImg/$Images3");
        // insert 
        
            $insert=$db->prepare("INSERT INTO products (Product_Titel,Product_Desc,Product_KewWord,CatogryID,BrandsID,image1,image2,image3,ProductPrice,stuts) VALUES(:Titel,:Disc,:Keyword,:secC,:secB,:img1,:img2,:img3,:pr,'true')");

            $insert->bindparam("Titel",$Product_Titel);
            $insert->bindparam("Disc",$Discription);
             $insert->bindparam("Keyword",$KeyWord);
             $insert->bindparam("secC",$select_Catog);
             $insert->bindparam("secB",$select_brand);
              $insert->bindparam("img1",$Images1);
             $insert->bindparam("img2",$Images2);
             $insert->bindparam("img3",$Images3);
            $insert->bindparam("pr",$Price);

              if ($insert->execute()) {
                  echo "<script> alert('Sucess ')</script>";
              }
              

        //CHEACK empty
        elseif (empty($Product_Titel)||empty($Discription)||empty($KeyWord)||empty($select_Catog)||empty($select_brand)||empty($Price)||empty($Images1)||empty($Images2)||empty($Images3)) {
             echo "<script> alert('Pleaze Enter Data')</script>";
         
        } 
      


    }
 
 
 
?>