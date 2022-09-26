<!DOCTYPE html>
<html lang="en">
<head>
	<title>Current Tariff Rate</title>
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
		.tarif{
			float:center;
			text-align: center;
			background-color: red;
			padding: 10px;
			width: 400px;
			margin-left: 35%;
			border-radius: 15px;
			color: white;
		}
		table {
			border-collapse: collapse;
			width: 80%;
			margin-left: 10%;
		}

		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {background-color:#f5f5f5;}

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
	<div>
		<h2 class="tarif">TARIFF RATE</h2><br><br>
		<p style="text-align: center;">Effective for all Kinds of Customers according to the Government </p><br><br>

		<table>
			<tr>
				<th>SL</th>
				<th>Slab</th>
				<th>Tariff Per Unit Rate (Tk.)</th>
				<th>Meter Charge(Tk./Month)</th>
				<th>Vat</th>
			</tr>
			<tr>
				<td>1</td>
				<td>From 00 to 75 units</td>
				<td>3.92</td>
				<td>10</td>
				<td>5%</td>
			</tr>
			<tr>
				<td>2</td>
				<td>From 76 to 200 units</td>
				<td>5.45</td>
				<td>10</td>
				<td>5%</td>
			</tr>
			<tr>
				<td>3</td>
				<td>From 201 to 300 units</td>
				<td>5.70</td>
				<td>10</td>
				<td>5%</td>
			</tr>
			<tr>
				<td>4</td>
				<td>From 301 to 400 units</td>
				<td>6.02</td>
				<td>10</td>
				<td>5%</td>
			</tr>
			<tr>
				<td>5</td>
				<td>From 401 to 600 units</td>
				<td>9.30</td>
				<td>10</td>
				<td>5%</td>
			</tr>
			<tr>
				<td>6</td>
				<td>From 601 to above units</td>
				<td>10.70</td>
				<td>10</td>
				<td>5%</td>
			</tr>
			
			
			
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