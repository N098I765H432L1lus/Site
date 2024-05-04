<?php
include_once 'db.php';

$id=$_GET['id'];
$name=$_POST['name'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Type_aces` WHERE `name`='$name'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$com_add_ws="UPDATE `Type_aces` SET `name`='$name' WHERE `id`='$id'";

$row_td_aces = mysqli_fetch_array($run_out_user);
$id_type=$row_td_aces['id'];

if ($id_type='3') {
	$_SESSION['error']="Незльзя удалить(Важный-Не редоктируемый)";
	$file="aces_type.php";
}
else {
if ($reg) {
	if ($name) {
		if ($rows_count=='0') {
			$run_add_ws = mysqli_query($con, $com_add_ws);
			if ($run_add_ws) {
				$file="aces_type.php";
			}
			else {
				$_SESSION['error']="Ошибка";
				$file="acse_edit.php";
			}
		}
		else {
			$_SESSION['error']="Этот адрес занят";
			$file="acse_edit.php";
		}
	}
	else {
		$_SESSION['error']="Заполните все поля";
		$file="acse_edit.php";
	}
}
}
header("Location:/$file");
?>