<?php 
session_start();
$con = mysqli_connect('localhost' ,'root', '');
mysqli_select_db($con,'ebs');


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/topuhit/Font-Bangla@1.0.3/1.0.0/font-bangla.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 


  <title> Electricity Bill Payment | Register</title>
  <style>


    .pay{
     width:45%;
     height:80%;
     margin-top:50px;
     position:relative;
     left:10%;
     padding-left:12%;
     background-color: #ccc;
     border: 4px solid transparent;
     border-radius: 8px;
   }

   input[type="text"], [type="number"] {
    width:45%;
    height:8px;
    margin-bottom:5px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  label {
    margin-bottom: 2px;
    display: block;
  }

  .icon-container {
    margin-bottom: 5px;
    padding: 7px 0;
    font-size: 24px;
  }


  .btn {
    background-color: #4CAF50;
    margin: 10px 0;
    border:none ;
    width:18%;
    border-radius: 3px;
    font-size: 19px;
  }

  .btn:hover {
    background-color: #45a049;
  }

  a {
    color: #2196F3;
  }

  hr {
    border: 1px solid lightgrey;
  }

  span.price {
    float: right;
    color: grey;
  }

  h1{
    position:relative;
    right:.01%;
    top:-1%;
    width:100%;
    height:16%;
    padding-top:30px;
    text-decoration:underline;
    text-decoration-color:#33cc33;
    font-size:40px;
    margin: auto;
    background-color: #99ff99;
    background-size:cover;
  }

</style>


</head>

<?php
$email = $_SESSION['email'];
$query = mysqli_query($con,"select * from usertbl where Email='$email'");
$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
$id = $row["ID"];
$name1 = $row["Name"];
$mobile1= $row["Mobile"];
//echo $id . $name1 . $mobile1;


$method = '';
if (isset($_POST['submit'])) {

  $method = "Credit Card";
  $accountno = $_POST['cardnumber'];
  $ammount = $_POST['ammount'];

  $fresult = $_SESSION['bill'];
  $date = $_SESSION['date'];
  $id = $_SESSION['id'];

  
  mysqli_query($con," insert into admin(name,mobile,bill,payment,accountno,method,date,user_id) value('$name1', '$mobile1' ,'$fresult', '$ammount', '$accountno', '$method' , '$date' , '$id')");
  
}

?>

  <h1><center> Electricity Bill Payment </center></h1>
  <body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" style="color: #4CAF50" href="userpanel.php">Dashboard</a>
      </div>
      
    </div>
  </nav>   

  <form class="pay" method="post"> 
    <div  class="col-50">
      <h2>Payment</h2>
      <label for="">Accepted Cards</label>
      <div class="icon-container">
        <i class="fa fa-cc-visa" style="color:navy;"></i>
        <i class="fa fa-cc-amex" style="color:blue;"></i>
        <i class="fa fa-cc-mastercard" style="color:red;"></i>
        <i class="fa fa-cc-discover" style="color:orange;"></i>
      </div>

      <label for="">Name on Card</label>
      <input type="text" id="cname" name="cardname" placeholder="">
      <label for="">Credit card number</label>
      <input type="text" id="ccnum" name="cardnumber" placeholder="">
      <label for="">Exp Month</label>
      <input type="text" id="expmonth" name="expmonth" placeholder="">

      <div class="col-50">
        <label for="">Exp Year</label>
        <input type="text" id="expyear" name="expyear" placeholder="">
      </div>
      <div class="col-50">
        <label for="">CVV</label>
        <input type="text" id="cvv" name="cvv" placeholder="">
      </div>
      <div class="col-50">
        <label for="">Ammount</label>
        <input type="text" id="cvv" name="ammount" placeholder="Enter the ammount to pay">
      </div>

    </label>
    <input type="submit" name="submit" value="Submit" class="btn">
    <input type="submit" value="Reset" class="btn">
  </div>
</form>

</body>
</html>
