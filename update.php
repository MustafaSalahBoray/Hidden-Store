 <?php 
     if(isset($_POST['updateQuan'])){
       $update=$db->prepare("UPDATE cart_details SET quantite=:QTY WHERE productID=:PU ");
       $update->bindparam("QTY",$_POST['qyt']);
       $update->bindparam("PU",$_POST['updateQuan']);
       $update->execute();
      
      if (is_numeric($_POST['qyt']===true)) {
        $total=$total*$_POST['qyt'];
      }
     }
    
  
?>