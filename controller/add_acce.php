<?php
include_once 'db.php';

$name=$_POST['name'];
$address=$_POST['address'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Acceptance` WHERE `address`='$address'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);


$file_name=$_FILES['image']['name'];
$file_tmp_name=$_FILES['image']['tmp_name'];

$name_file=explode(".", $file_name);
$ext=end($name_file);
$name_file=$name.date("mdHis_").'.'.$ext;

$full_path="../assets/image/Acceptance/$name_file";


$com_add_ws="INSERT INTO `Acceptance`(`image`, `name`, `address`) VALUES ('$name_file','$name','$address')";

if ($reg) {
	if ($name && $address) {
		if ($rows_count=='0') {
			$run_add_ws = mysqli_query($con, $com_add_ws);
			echo "$com_add_ws";
			if ($run_add_ws) {

				move_uploaded_file($file_tmp_name, $full_path);
				$file="add_ws.php";
			}
			else {
				$_SESSION['error_1']="Ошибка";
				$file="add_ws.php";
			}
		}
		else {
			$_SESSION['error_1']="Этот адрес занят";
			$file="add_ws.php";
		}
	}
	else {
		$_SESSION['error_1']="Заполните все поля";
		$file="add_ws.php";
	}
}
header("Location:/$file");
?>