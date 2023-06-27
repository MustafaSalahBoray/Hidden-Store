<?php 
require '../DB_connect.php';
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="../Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../Style.css">
  <script type="text/javascript" src="../Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Library/js/jquery-3.6.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Hidden Store</title>
</head>
<body>

                         <div class="container">
      <h1 class="text-center ">Admin Login </h1>
      <!-- Form --> 
      <form method="POST" >
       
     <div class="form-outline mb-4">
          <label for="USERNAME" class="form-label">USERNAME</label>
          <input type="text" name="USERNAME" id="USERNAME" placeholder="Enter USERNAME " class="form-control" autocomplete="off">
        </div>
        <!-- password -->
        <div class="form-outline mb-4">
          <label for="Password" class="form-label">Password</label>
          <input type="Password" name="Password" id="Password"placeholder= "Password" class="form-control" autocomplete="off">
        </div>
       
     
        <div class="form-outline mb-4">
     <a href="<script> window.open('http://localhost/Hidden%20Store/USERS/Payment.php?user=<?php echo $key['UserId']?>">   <button type="submit" name="submit" class="btn btn-info py-2 px-3 Border-0" >Login</button> </a>
            <p class=" fw-bold mt-2 pt-1 mb-0">Dont Have an account? <a href="http://localhost/Hidden%20Store/USERS/usersRegistration.php" class="text-danger">Regiser</a></p>
          </div>
      </form>
    </div>

     
</body>
</html>
<?php 

  if (isset($_POST['submit'])) {
    
    $Login=$db->prepare("SELECT * FROM admins WHERE UserName =:USERNAME And Password=:PU ");
    $Login->bindparam("USERNAME",$_POST['USERNAME']);
     $Login->bindparam("PU",$_POST['Password']);
    $Login->execute();
    
    
    if ($Login->rowcount()==1 ){
              $user=$Login->fetchObject();
              if ($user->ACTIEVE==="0") {
                      session_start();
                       $_SESSION['user']=$user; 
                 
            echo "<script> alert('succesful')</script>"; 
                echo "<script> window.open('http://localhost/Hidden%20Store/Admin/','_self')</script>"; 
              }
                // code...
              }
          
             
          }
       //    else
       // {
       //                    echo "<script> window.open('http://localhost/Hidden%20Store/USERS/.php','_self')</script>"; 
   
       // }
       

     
       
      
    


?>
