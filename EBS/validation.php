<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'ebs');

$email = $_POST['email'];

$pass = $_POST['password'];


$s = " select * from usertbl where Email = '$email' && Password = '$pass'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1)
{
	//$_SESSION['name'] = $name;
	//$mail = $_POST['email'];
	$_SESSION['email'] = $email;
	
	header('location:userpanel.php');
}else{
	header('location:login.php');
	
}

?>