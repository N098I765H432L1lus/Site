<?php
include_once 'db.php';

$id=$_GET['id'];
$name=$_POST['name'];
$address=$_POST['address'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Acceptance` WHERE `address`='$address'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$jobs_sql="SELECT * FROM `Acceptance` WHERE `id`='$id'";
$run_jobs_sql=mysqli_query($con, $jobs_sql);

$row_ws = mysqli_fetch_array($run_jobs_sql);
$image=$row_ws['image'];

$file_name=$_FILES['image']['name'];
$file_tmp_name=$_FILES['image']['tmp_name'];

if ($file_tmp_name) {
	$name_file=explode(".", $file_name);
	$ext=end($name_file);
	$name_file=$name.date("mdHis_").'.'.$ext;

	$full_path="../assets/image/Acceptance/$name_file";
}
else {
	$name_file = $image;
}


$com_add_ws="UPDATE `Acceptance` SET `image`='$name_file',`name`='$name',`address`='$address' WHERE `id`='$id'";

if ($reg) {
	if ($name && $address) {
		if ($rows_count=='0' || $rows_count=='1') {
			$run_add_ws = mysqli_query($con, $com_add_ws);
			if ($run_add_ws) {
				move_uploaded_file($file_tmp_name, $full_path);
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