<?php 
session_start();
$con = mysqli_connect('localhost' ,'root', '');
mysqli_select_db($con,'ebs');


?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/topuhit/Font-Bangla@1.0.3/1.0.0/font-bangla.css"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	
	<title> Electricity Bill Payment | Register</title>
	

</head>
<style>

	.tab{
		margin:100px 0px 0px 20px;
		padding-left:20px;
		height: 400px;
		width:50%;
		font-size: 18px;
		background-color:#a4c779;
		border: 3px solid transparent;
		border-radius: 5px;
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

	$method = "DBBL";
	$accountno = $_POST['accountno'];
	$ammount = $_POST['ammount'];

	$fresult = $_SESSION['bill'];
	$date =	$_SESSION['date'];
	$id = $_SESSION['id'];

	
	mysqli_query($con," insert into admin(name,mobile,bill,payment,accountno,method,date,user_id) value('$name1', '$mobile1' ,'$fresult', '$ammount', '$accountno', '$method' , '$date' , '$id')");
	
}

?>
<body>
	


	<center>
		<h1> Electricity Bill Payment </h1>
		<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" style="color: #4CAF50" href="userpanel.php">Dashboard</a>
			</div>
			
		</div>
	</nav>
	

		<div class="tab">
			<div class="tab-1" aria-labelledby="tab_item-0">
				<div id="payment-info">
					<h3 class="pay-title">DBBL Account Info....</h3>
					<form action="" method="post">

						<h4>Mobile Account</h4>													
						<input class="pay-logo" type="number" name="accountno" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">

						<h4>PIN</h4>													
						<input class="pay-logo" type="password" value="xxxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxxx' required="">

						<h4>Ammont to pay</h4>													
						<input type="number" name="ammount" id="ammount" placeholder="Enter Ammont" />

						

						<input type="submit" name="submit" value="Submit">
						<input type="submit" value="Reset">
					</form>
				</div>
			</div>
		</div>
	</center>

</body>
</html>
