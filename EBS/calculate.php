<?php 
session_start();
$con = mysqli_connect('localhost' ,'root', '');
mysqli_select_db($con,'ebs');


?>

<!DOCTYPE html>

<head>
	<title>Calculate Electricity Bill</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		input[type=number], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=submit] {
			width: 100%;
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}
		label{
			color: #45a049;
			font-size: 25px;
		}

		.page-wrap {
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
		}
		.res {
			border-radius: 5px;
			padding: 20px;
			margin-left: 100px;
		}

		.footer{
			background-color: #235;
			height: 150px;
			padding: 20px
		}
		.topnav {
			position: relative;
			overflow: hidden;
			background-color: #333;
		}

		.topnav a {
			float: left;
			color: #f2f2f2;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 17px;
		}
		.topnav a.bkash{
			position: relative;    
			left: 38%;
			background-color: #4CAF50;
		}
		.topnav a.dbbl{
			position: relative;
			left: 41%;
			background-color: #4CAF50;
		}
		.topnav a.card{
			position: relative;
			left: 44%;
			background-color: #4CAF50;
		}

		.topnav a:hover {
			background-color: #ddd;
			color: black;
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


$result_str = $result = $bill_str = $vat_str = $mcharge_str = '';
if (isset($_POST['unit-submit'])) {
	$punits = $_POST['units'];
	$runits = $_POST['units1'];
	$units = $runits-$punits;

	if (!empty($units)) {

		$date = date("Y/m/d");

		$result = calculate_bill($units);
		$vat = ($result * 5)/100;
		$mcharge = 10;

		$fresult = $result + $vat + $mcharge;

		$result_str = 'Total amount to pay for ' . $units . ' units is = ' . $fresult . 'tk';
		$bill_str = 'Your bill is = ' . $result . 'tk';
		$vat_str = 'Vat(5%) on the bill is = ' . $vat . 'tk';
		$mcharge_str = 'Meter charge is = ' . $mcharge . 'tk';
		//mysql_query(" insert into usertable(bill,date,user_id) value('$result', '$date' , '$id')");

		$_SESSION['bill'] = $fresult;
		$_SESSION['date'] = $date;
		$_SESSION['id'] = $id;
		

	}
}
/**
 * To calculate electricity bill as per unit cost
 */
function calculate_bill($units) {
	$unit_cost_first = 3.92;
	$unit_cost_second = 5.45;
	$unit_cost_third = 5.70;
	$unit_cost_fourth = 6.02;
	$unit_cost_fifth = 9.30;
	$unit_cost_sixth = 10.70;


	if($units <= 75) {
		$bill = $units * $unit_cost_first;
	}
	else if($units > 75 && $units <= 200) {
		$temp = (75 * $unit_cost_first);
		$remaining_units = $units - 75;
		$bill = $temp + ($remaining_units * $unit_cost_second);
	}
	else if($units > 200 && $units <= 300) {
		$temp = (75 * 3.92) + (200 * $unit_cost_second);
		$remaining_units = $units - 275;
		$bill = $temp + ($remaining_units * $unit_cost_third);
	}
	else if($units > 300 && $units <= 400) {
		$temp = (75 * 3.92) + (300 * $unit_cost_third);
		$remaining_units = $units - 375;
		$bill = $temp + ($remaining_units * $unit_cost_fourth);
	}
	else if($units > 400 && $units <= 600) {
		$temp = (200 * 5.45) + (300 * 5.70);
		$remaining_units = $units - 500;
		$bill = $temp + ($remaining_units * $unit_cost_fifth);
	}
	else {
		$temp = (200 * 5.45) + (300 * 5.70) + (100 * 6.02);
		$remaining_units = $units - 600;
		$bill = $temp + ($remaining_units * $unit_cost_fourth);
	}
	return number_format((float)$bill, 2, '.', '');
}

?>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="userpanel.php">Dashboard</a>
			</div>
			
		</div>
	</nav>
	<div class="page-wrap">
		<h1 style="text-align: center; font-size: 50px;">Calculate Electricity Bill</h1>
		
		<form action="" method="post" id="quiz-form">

			<label for="">Enter Previous Month Peak Rating</label>
			<input type="number" name="units" id="units" placeholder="Please enter previous months rating" />
			<label for="">Enter This Month Peak Rating</label>
			<input type="number" name="units1" id="units1" placeholder="Please enter this months rating" />          
			<input type="submit" name="unit-submit" id="unit-submit" value="Submit" />		
		</form>

		<div class="res">
			<?php echo '<span style="color: #235; font-size: 20px;"><br />' . $bill_str; ?>
			<?php echo '<span style="color: #235; font-size: 20px;"><br />' . $vat_str; ?>
			<?php echo '<span style="color: #235; font-size: 20px;"><br />' . $mcharge_str; ?>
			<?php echo '<span style="color: #235; font-size: 20px;"><br />' . $result_str; ?>

		</div>	

		
	</div>
	<div class="footer">
		<h2 style="color: white;text-align: center; ">Select A Payment Method To Pay The Bill</h2>
		<div class="topnav">
			<div>
				<a href="bkash.php" class="bkash">bkash</a>
				<a href="dbbl.php" class="dbbl">DBBL</a>
				<a href="credit.php" class="card">Credit Card</a>

			</div>
		</div>

	</div>
</body>
</html>