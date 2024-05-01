<?php
include_once 'db.php';

$num_jobs=$_POST['num_jobs'];
$ws=$_POST['ws'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Jobs` WHERE `name`='$num_jobs' AND `id_w_shop`='$ws'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$com_add_jobs="INSERT INTO `Jobs`(`name`, `id_w_shop`) VALUES ('$num_jobs','$ws')";

if ($reg) {
	if ($num_jobs && $ws) {
		if ($rows_count=='0') {
			$run_add_jobs = mysqli_query($con, $com_add_jobs);
			if ($run_add_jobs) {
				$file="add_ws.php";
			}
		}
		else {
			$_SESSION['error_2']="Это место сушествует";
			$file="add_ws.php";
		}
	}
	else {
		$_SESSION['error_2']="Заполните все поля";
		$file="add_ws.php";
	}
}

header("Location:/$file");
?>