 <h2 class="text-center">Insert Brands</h2>
<form method="POST" class="mb-2">
	<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info"><i class="fa-solid fa-receipt"></i> </span>
  <div class="form-floating">
    <input type="text" class="form-control" placeholder="Insert Brands" name="add">
   
  </div>
  <div class="input-group w-10 mb-2">
  
     <button class="bg-info border-0 p-2  my-3" type="submit" name="submit">Insert Brands</button>
   
 
</div>
</form>
<?php  
   require '../DB_connect.php';
 if (isset($_POST['submit'])) {
  $show=$db->prepare("SELECT * FROM  brands WHERE Brands_titel=:titelE ");
    $show->bindparam("titelE",$_POST['add']);
    $show->execute();
    
    if ($show->rowcount()>0) {
        echo '<script> alert(" Brands Has been found")</script>';
    }
 
    else{ 
      $insert=$db->prepare("INSERT INTO  brands (Brands_titel ) VALUES(:titel)");
    $insert->bindparam("titel",$_POST['add']);
    if ($insert->execute()) {
       echo '<script> alert(" Brands Has been inserted Successfuly")</script>';
    }
    }
}
?>