<?php 
 require '../DB_connect.php';
 require 'Nav1.php';


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
	<title>MY-Profile</title>
</head>
<body>
	<div style="width:100px; height: 110px;"></div>
  <div class="row">
  	<div class="col-md-2 p-0">
  		<?php 
           session_start(); 
           if ($_SESSION['user']) {
           echo ' <ul class="navbar-nav bg-secondary">
  		     <li class="nav-item bg-info ">
              <a class="nav-link text-light text-center " href="h"> <h4>Profile</h4></a>
        </li> 
        <li class="nav-item ">
              <img class="ml-5" src="../img/'.$_SESSION['user']->user_image.'" alt="g" style="width:150px; height:150px; object-fit: contain;" >
        </li> 
        <li class="nav-item  ">
              <a class="nav-link text-light text-center " href="http://localhost/Hidden%20Store/USERS/Profile.php?MYORDER="> MY ORDER</a>
        </li>  
         
         <li class="nav-item  ">
              <a class="nav-link text-light text-center " href="http://localhost/Hidden%20Store/USERS/Profile.php?Update='.$_SESSION['user']->UserId .'"> Edite Account</a>
        </li>  
         
        <li class="nav-item ">
              <a class="nav-link text-light text-center " href="http://localhost/Hidden%20Store/USERS/Profile.php?DeleteAccount='.$_SESSION['user']->UserId.'">Delete Account</a>
        </li>  
        <li class="nav-item ">
              <a class="nav-link text-light text-center " href="http://localhost/Hidden%20Store/USERS/Profile.php?Logout='.$_SESSION['user']->UserId.'">logout</a>
        </li> 
  		</ul> 
';
           }

  		?>
  		
  	</div>
  	<div class="col-md-10"> 
  		<center>
  		<div class="container">
  		<?php 
     if (isset($_GET['Update'])) {
         $selectUser=$db->prepare("SELECT * FROM users");
         $selectUser->execute();
         foreach ($selectUser as $key) {
         
         
         echo '<form method="POST" enctype="multipart/form-data">
    		<div class="form-outline mb-4">
    			
    			<input type="text" name="USERNAME" id="USERNAME" placeholder="Enter USERNAME " class="form-control" autocomplete="off" value="'.$key['USERNAME'].'">
    		</div>
    		
    		<div class="form-outline mb-4">
    		
    			<input type="text" name="Email" id="Email" placeholder="Enter  Email" class="form-control" autocomplete="off" value="'.$key['user_Email'].'">
    		</div>
    	
    		<div class="form-outline mb-4">

    			<input type="Password" name="Password" id="Password"placeholder= "Password" class="form-control" autocomplete="off"  value="'.$key['user_password'].'">
    		</div>
    		
    		
    		<!-- Images1 -->
             <div class="form-outline mb-4 " >
    		
    			<input type="file" name="Images1" id="Images1" class="form-control">
    		</div>
         
    		
    	
    		
    			<div class="form-outline mb-4">
    		
    			<input type="text" name="Address" id="Address" placeholder="Enter Address" class="form-control" autocomplete="off"value="'.$key['user_Addres'].'">
    		</div>
            <div class="form-outline mb-4">
              
                <input type="text" name="mobile" id="mobile" placeholder="Enter  mobile" class="form-control" autocomplete="off"value="'.$key['user_mobile'].'">
            </div>
    		<div class="form-outline mb-4">
    		<button type="submit" name="UPDATE" class="btn btn-info py-2 px-3 Border-0" value="'.$key['UserId'].'">Update</button> 
      
         	</div>
    	</form>';}}
    	if (isset($_POST['UPDATE'])) { 
    		 $image=$_FILES['Images1']['name'];
       			$imagetmp=$_FILES['Images1']['tmp_name'];
               move_uploaded_file($imagetmp,"USERS/$image");
    		  $updat=$db->prepare("UPDATE  users SET USERNAME=:USERNAME , user_Email=:EMAIL , user_password=:PASSWOED , user_image=:IMAGE , user_Addres=:ADDREES , user_mobile=:MOB WHERE UserId =:ID"); 
    		  $updat->bindparam("USERNAME",$_POST['USERNAME']);
    		  $updat->bindparam("EMAIL",$_POST['Email']);
    		  $updat->bindparam("PASSWOED",$_POST['Password']);
    		  $updat->bindparam("IMAGE",$_FILES['Images1']);
    		  $updat->bindparam("ADDREES",$_POST['Address']);
    		    $updat->bindparam("MOB",$_POST['mobile']);
    		     $updat->bindparam("ID",$_POST['UPDATE']);
    		    if ($updat->execute()) {
    		    echo "<script>alert('SuccessFul is Update')</script>";
    		    }
    		    else{
    		    	echo "string";
    		    }

    	}//

?>
  	</div></center></div>
  	
  </div> 
  <footer>
  </div>
    <div class="col-md-12 text-center bg-info text-red">
          <hr class="bg-light">
          <p class="mb-0 size">All Right reverse &copy;</p>
           <p class="size">made by  :❤mustafa salah </p>
              <p class="size">made in Years  : 2023-1-7 </p>
    </div>
    <!-- DEleeeeeeeeeeeeeeeeeeeeeeet -->
     <?php 
         if (isset($_GET['DeleteAccount'])) {
         $DeleteAccount= $db->prepare("DELETE FROM users WHERE UserId=:IDD");
         $DeleteAccount->bindparam("IDD",$_GET['DeleteAccount']);
         if ($DeleteAccount->execute()) {
         	echo "<script> alert('SuccessFul is Deleted')</script>";
         }
         }
    ?>
    <!-- Logoutttttttttttttttttttttttttt -->
    <?php 
         if (isset($_GET['Logout'])) {
         	session_destroy();
         	session_unset();
         	header("location:http://localhost/Hidden%20Store/");
         }
     
    ?>
</div>
  </div>
</footer>
</body>
</html>
