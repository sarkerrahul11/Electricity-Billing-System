<?php 

session_start();
$con = mysqli_connect('localhost' ,'root', '');
mysqli_select_db($con,'ebs');

$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		table {
			border-collapse: collapse;
			width: 80%;
			
		}

		.head{
			background-color: #4CAF50;
			color: white;
			text-align: center;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
	</style>
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Dashboard</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="calculate.php">Calculate Bill</a></li>
				<li><a href="logout.php">Logout</a></li>

			</ul>
		</div>
	</nav>

	<div style="text-align: center; margin-top: 200px;">
		<h1>Welcome To Electricity Billing System </h1>
		<p>Here you can calculate bill and payment your Electric bill</p><br><br><br>
		<h3 style="color: green;">Here is your all payment details</h3><br><br>
	</div>

	<div>
		<?php

		$query1 = mysqli_query($con,"select * from usertbl where Email='$email'");
		$row1=mysqli_fetch_array($query1,MYSQLI_ASSOC);
		$id1 = $row1["ID"];
		$name1 = $row1["Name"];
		$mobile1= $row1["Mobile"];

		$query=mysqli_query($con,"select * from admin where user_id=$id1");
		$rowcount=mysqli_num_rows($query);
		?>

		<table align="center">
			<tr class="head">
				<td>
					Bill
				</td>
				<td>
					Payment
				</td>
				<td>
					Account No
				</td>
				<td>
					Method
				</td>
				<td>
					Date
				</td>

			</tr>
			<?php

			for ($i=1; $i <= $rowcount; $i++) { 
				$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
				?>
				<tr>
					<td>
						<?php echo $row["bill"]; ?>
					</td>
					<td>
						<?php echo $row["payment"]; ?>
					</td>
					<td>
						<?php echo $row["accountno"]; ?>
					</td>
					<td>
						<?php echo $row["method"]; ?>
					</td>
					<td>
						<?php echo $row["date"]; ?>
					</td>

				</tr>
				<?php
			} 

			?>
		</table>
	</div>

</body>
</html>
