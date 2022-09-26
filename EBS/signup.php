<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="reg-box">
		<div class="row">
			<div class="col-md-6 reg-left">
				<h2 style="text-align:center; ">User Registration Form</h2>
				<form action="reg.php" method="post">

					<div class="form-group">
						<label for="">Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>


					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Mobile</label>
						<input type="text" name="mobile" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="">Confirm Password</label>
						<input type="password" name="cpassword" class="form-control" required>
					</div>



					<button type="submit" class="btn btn-primary">Register</button>
					<button type="submit" style="float: right; width: 100px;" class="btn btn-primary"><a  href="user.php" style="color: white;">User</a></button>
					


					
				</form>
			</div>
		</div>
		</div>
	</div>
	
</body>
</html>