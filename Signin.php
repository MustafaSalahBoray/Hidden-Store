<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" type="text/css" href="Library/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style.css">
  <script type="text/javascript" src="Library/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="Library/js/jquery-3.6.1.min.js"></script>
	<title>PHP_CHAT</title>
</head>
<body> 
	<div class="Sign_up">
		<form method="POST">
			<div class="form-header">
				<h2>PHP_MY CHAT</h2>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="Email" class="form-control" autocomplete="off" required>
				
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" autocomplete="off" required>
				
			</div>
			<div class="small">Forget-password?<a href="" >Click Here</a></div>
			<div class="form-group">
				<button type="submit" class=" btn btn-primary btn-block btn-lg">Sign In</button>
			</div>
		</form>
		<div class="text-center small" style="color: #764288;">Dont Have An account?<a href="Sign_in.php">Create</div>
	</div>

</body>
</html>