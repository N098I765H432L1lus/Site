<?php
include_once 'db.php';

$login=$_POST['login'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$password=$_POST['password'];
$jobs=$_POST['jobs'];
$role=$_POST['role'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `users` WHERE `login`='$login'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$msq_add_user="INSERT INTO `users`(`login`, `name`, `surname`, `role`, `jobs_id`, `password`) VALUES ('$login','$name','$surname','$role','$jobs','$password')";

if ($reg) {
	if ($login && $name && $surname && $password && $jobs && $role) {
		if ($rows_count=='0') {
			$run_add_user = mysqli_query($con, $msq_add_user);
			if ($run_add_user) {
				$file="add_user.php";
			}
			else {
				$_SESSION['error']="Ошибка";
				$file="add_user.php";
			}
		}
		else {
		$_SESSION['error']="Такой логин занят";
		$file="add_user.php";
	}
	}
	else {
		$_SESSION['error']="Заполните все поля";
		$file="add_user.php";
	}
}
header("Location:/$file");
?>