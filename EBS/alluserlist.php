<?php 

session_start();
$con = mysqli_connect('localhost' ,'root', '');
mysqli_select_db($con,'ebs');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Users List</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>

		body {
			font-family: Arial;
			margin: 0;
		}
		.header {
			padding: 30px;
			text-align: center;
			background: #1abc9c;
			color: white;

		}
		.sidebar {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 60px;
		}

		.sidebar a {
			padding: 8px 8px 8px 32px;
			text-decoration: none;
			font-size: 25px;
			color: #818181;
			display: block;
			transition: 0.3s;
		}

		.sidebar a:hover {
			color: #f1f1f1;
		}

		.sidebar .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}

		.openbtn {
			font-size: 20px;
			cursor: pointer;
			background-color: #111;
			color: white;
			padding: 10px 15px;
			border: none;
		}

		.openbtn:hover {
			background-color: #444;
		}

		#main {
			transition: margin-left .5s;
			padding: 16px;
		}
		.bar{
			background-color: #4CAF50;
			width: 100%;
		}
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


		/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
		@media screen and (max-height: 450px) {
			.sidebar {padding-top: 15px;}
			.sidebar a {font-size: 18px;}
		}
	</style>
</head>
<body>

	<div class="header">
		<h1>ELECTRICITY BILLING SYSTEM</h1>
	</div>

	<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		<a href="tariff.php">Current Tariff Rate</a>
		<a href="alluserlist.php">All Users List</a>
		<a href="alluserpayment.php">All Users Payment List</a>
		<a href="adminlogout.php">Logout</a>
	</div>

	<div class="bar">
		<div id="main">
			<button class="openbtn" onclick="openNav()">☰</button>  
		</div>
	</div>
	<br><br><h3 style="text-align: center;color: #235;">Registered All Users List</h3><br><br>
	<div>
		<?php

		$query=mysqli_query($con,"select * from usertbl ");
		$rowcount=mysqli_num_rows($query);
		?>

		<table align="center">
			<tr class="head">
				<td>
					User Name
				</td>
				<td>
					Email
				</td>
				<td>
					Mobile
				</td>
			</tr>
			<?php

			for ($i=1; $i <= $rowcount; $i++) { 
			$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
			?>
			<tr>
				<td>
					<?php echo $row["Name"]; ?>
				</td>
				<td>
					<?php echo $row["Email"]; ?>
				</td>
				<td>
					<?php echo $row["Mobile"]; ?>
				</td>

			</tr>
			<?php
		} 

		?>
	</table>
</div>

<script>
	function openNav() {
		document.getElementById("mySidebar").style.width = "250px";
		document.getElementById("main").style.marginLeft = "250px";
	}

	function closeNav() {
		document.getElementById("mySidebar").style.width = "0";
		document.getElementById("main").style.marginLeft= "0";
	}
</script>

</body>
</html>