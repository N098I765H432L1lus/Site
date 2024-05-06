<?php
include_once 'db.php';

$name=$_POST['name'];
$description=$_POST['description'];
$quantity_aces=$_POST['quantity_aces'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Type_dev` WHERE `name`='$name' AND `description`='$description'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$com_add_jobs="INSERT INTO `Type_dev`(`name`, `description`, `quantity_aces`) VALUES ('$name','$description','$quantity_aces')";

if ($reg) {
	if ($name && $description) {
		if ($rows_count=='0') {
			$run_add_jobs = mysqli_query($con, $com_add_jobs);
			if ($run_add_jobs) {
				$file="type_dev.php";
			}
		}
		else {
			$_SESSION['error']="Это место сушествует";
			$file="type_dev.php";
		}
	}
	else {
		$_SESSION['error']="Заполните все поля";
		$file="type_dev.php";
	}
}

header("Location:/$file");
?>