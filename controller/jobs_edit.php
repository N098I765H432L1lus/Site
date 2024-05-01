<?php
include_once 'db.php';

$id=$_GET['id'];
$name=$_POST['num_jobs'];
$ws=$_POST['ws'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Jobs` WHERE `name`='$name' AND `id_w_shop`='$ws'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$jobs_sql="SELECT * FROM `Jobs` WHERE `id`='$id'";
$run_jobs_sql=mysqli_query($con, $jobs_sql);

$com_add_ws="UPDATE `Jobs` SET `name`='$name',`id_w_shop`='$ws' WHERE `id`='$id'";

if ($reg) {
	if ($name && $ws) {
		if ($rows_count=='0' || $rows_count=='1') {
			$run_add_ws = mysqli_query($con, $com_add_ws);
			if ($run_add_ws) {
				$file="add_ws.php";
			}
			else {
				$_SESSION['error']="Ошибка";
				$file="add_ws.php";
			}
		}
		else {
			$_SESSION['error']="Этот адрес занят";
			$file="add_ws.php";
		}
	}
	else {
		$_SESSION['error']="Заполните все поля";
		$file="add_ws.php";
	}
}
header("Location:/$file");
?>