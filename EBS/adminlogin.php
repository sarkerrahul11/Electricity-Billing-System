<?php

session_start();

?>

<?php
$mail = $password = '';

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'ebs');

if (isset($_POST['submit'])) {
$mail = $_POST['email'];

$password = $_POST['password'];
}

$s = " select * from admintbl where email = '$mail' && password = '$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if (isset($_POST['submit'])) {
if($num == 1)
{

  header('location:admin.php');
}else{
header('location:adminlogin.php');

}
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <style>
    body{
      background-image: url("6.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    .reg-box{
      max-width: 1000px;
      float: none;
      margin: 150px auto;
    }

    .reg-left{
      background: rgba(211,211,211,0.5);
      padding: 30px;
    }

    .form-control{
      background-color: transparent !important;
    }
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

  <div class="container">
    <div class="reg-box">
      <div class="row">
        <div class="col-md-6 reg-left">
          <h2 style="text-align:center; color: white; ">Admin Login</h2>
          <form action="" method="post">

            <div class="form-group">
              <label for="" style="color: white;">Email</label>
              <input type="text" name="email" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="" style="color: white;">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Login</button>

            <button type="submit" style="float: right;" class="btn btn-primary"><a href="home.php" style="color: white;">Home</a></button>

          </form>
        </div>
      </div>
    </div>
  </div>
  
</form>
</body>
</html>
