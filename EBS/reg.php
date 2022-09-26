<?php

session_start();
header('location:login.php');

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'ebs');

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];

$s = " select * from usertbl where Mobile = '$mobile'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
	echo "This name is already register...";
}else{
	$reg = " insert into usertbl(Name, Email, Mobile, Password, Cpassword) values('$name' , '$email' , '$mobile' , '$pass' , '$cpass')";
	mysqli_query($con, $reg);
	
	echo "Registration Successful..";
}

?>