<?php
include_once 'db.php';

$id=$_GET['id'];
$login=$_POST['login'];
$name=$_POST['name'];
$surname=$_POST['surname'];
$password=$_POST['password'];
$jobs=$_POST['jobs'];
$role=$_POST['role'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `users` WHERE `id`='$id'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$msq_add_user="UPDATE `users` SET `login`='$login',`name`='$name',`surname`='$surname',`role`='$role',`jobs_id`='$jobs',`password`='$password' WHERE `id`='$id'";

if ($reg) {
	if ($login && $name && $surname && $password && $jobs && $role) {
		if ($rows_count=='1' || $rows_count=='0') {
			echo "$msq_add_user";
			$run_add_user = mysqli_query($con, $msq_add_user);
			if ($run_add_user) {
				$file="add_user.php";
			}
			else {
				$_SESSION['error']="Ошибка";
				$file="user_edit.php";
			}
		}
		else {
		$_SESSION['error']="Такой логин занят";
		$file="user_edit.php";
	}
	}
	else {
		$_SESSION['error']="Заполните все поля";
		$file="user_edit.php";
	}
}
header("Location:/$file");
?>