<?php
include_once 'db.php';

$name=$_POST['name'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Type_aces` WHERE `name`='$name'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$com_add_jobs="INSERT INTO `Type_aces`(`name`) VALUES ('$name')";

if ($reg) {
	if ($name) {
		if ($rows_count=='0') {
			$run_add_jobs = mysqli_query($con, $com_add_jobs);
			if ($run_add_jobs) {
				$file="aces_type.php";
			}
		}
		else {
			$_SESSION['error']="Это место сушествует";
			$file="aces_type.php";
		}
	}
	else {
		$_SESSION['error']="Заполните все поля";
		$file="aces_type.php";
	}
}

header("Location:/$file");
?>