<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body{
  background-image: url("1.png");
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
        <h2 style="text-align:center; ">User Login</h2>
        <form action="validation.php" method="post">

          <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Login</button>
          <button type="submit" style="float: right; width: 100px;" class="btn btn-primary"><a href="user.php" style="color: white;">User</a></button> 

          
        </form>
      </div>
    </div>
    </div>
  </div>
  
</form>
</body>
</html>
