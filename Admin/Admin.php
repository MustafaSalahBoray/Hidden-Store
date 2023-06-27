<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="../Library/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Style.css">
    <script type="text/javascript" src="../Library/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Library/js/jquery-3.6.1.min.js"></script>
	<title>Insert Admin</title>
</head>
<body class="bg-light">
    <div class="container">
    	<h1 class="text-center ">Insert Admin </h1>
    	<!-- Form --> 
    	<form method="POST" enctype="multipart/form-data">
    		<div class="form-outline mb-4">
    			<label for="USERNAME" class="form-label">USERNAME</label>
    			<input type="text" name="USERNAME" id="USERNAME" placeholder="Enter USERNAME " class="form-control" autocomplete="off">
    		</div>
    		<!-- Discription  -->
    		<div class="form-outline mb-4">
    			<label for="Email" class="form-label">Email</label>
    			<input type="text" name="Email" id="Email" placeholder="Enter  Email" class="form-control" autocomplete="off">
    		</div>
    		<!-- KeyWord -->
    		<div class="form-outline mb-4">
    			<label for="Password" class="form-label">Password</label>
    			<input type="Password" name="Password" id="Password"placeholder= "Password" class="form-control" autocomplete="off">
    		</div>
    		
    		
    		<!-- Images1 -->
             <div class="form-outline mb-4 " >
    			<label for="Images1" class="form-label"> Images1</label>
    			<input type="file" name="Images1" id="Images1" class="form-control">
    		</div>
            
    		
    	
    		<!-- Price -->
    			<div class="form-outline mb-4">
    			<label for="Address" class="form-label">Address</label>
    			<input type="text" name="Address" id="Address" placeholder="Enter Address" class="form-control" autocomplete="off">
    		</div>
            <div class="form-outline mb-4">
                <label for="mobile" class="form-label">mobile</label>
                <input type="text" name="mobile" id="mobile" placeholder="Enter  mobile" class="form-control" autocomplete="off">
            </div>
    		<div class="form-outline mb-4">
    		<button type="submit" name="submit" class="btn btn-info py-2 px-3 Border-0">Regiser</button> 
            <p class=" fw-bold mt-2 pt-1 mb-0">Already Have an account ? <a href="http://localhost/Hidden%20Store/Admin/SighnAdmin.php" class="text-danger">Login</a></p>
         	</div>
    	</form>
    </div>
</body>
</html> 
<?PHP  
require '../DB_connect.php';

   if (isset($_POST['submit'])) {

       $image=$_FILES['Images1']['name'];
       $imagetmp=$_FILES['Images1']['tmp_name'];
   move_uploaded_file($imagetmp, "../Admin/$image");
    
       $IsExist=$db->prepare("SELECT * FROM admins WHERE UserName=:USERNAME");
       $IsExist->bindparam("USERNAME",$_POST['USERNAME']);
       $IsExist->execute();
       $IsExist=$IsExist->rowcount();
       if ($IsExist>0) {
                  echo "<script> alert('Already account reqisteres')</script>";
       }else{
       $reqister=$db->prepare("INSERT INTO admins (UserName,Email,Password,Images1,Address,mobile) VALUES (:USERNAME ,:user_Email ,:user_password,:user_image,:user_Addres ,:user_mobile)");
        $reqister->bindparam("USERNAME",$_POST['USERNAME']);
        $reqister->bindparam("user_Email",$_POST['Email']);
        $reqister->bindparam("user_password",$_POST['Password']);
        $reqister->bindparam("user_image",$image);
          
           $reqister->bindparam("user_Addres",$_POST['Address']);
             $reqister->bindparam("user_mobile",$_POST['mobile']);
            if ($reqister->execute()) {
                echo '<script>alert("Success Insert Admin")</script>';
            }
           }
       
      
  }  //)
  // ,,
?>
