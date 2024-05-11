<?php
include_once 'db.php';

$name=$_POST['name'];
$description=$_POST['description'];
$reg=$_POST['reg'];
$Type_dev=$_GET['Type_dev'];
$jobs=$_POST['jobs'];


//Есть ли такой
$out_user = "SELECT `id` FROM `technic` WHERE `name`='$name' AND `description`='$description'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);

$run_techn = mysqli_fetch_array($run_out_user);
$id_techn = $run_techn['id'];


//Количество
$quantity_ply_type_mql="SELECT * FROM `Type_dev` WHERE `id`='$Type_dev'";
$run_quantity_sql=mysqli_query($con, $quantity_ply_type_mql);
$row_quantity = mysqli_fetch_array($run_quantity_sql);
$quantity = $row_quantity['quantity'];
$quantity += 1;
$quantity_type_mql="UPDATE `Type_dev` SET `quantity`='$quantity' WHERE `id`='$Type_dev'";


//Изображение
$file_name=$_FILES['image']['name'];
$file_tmp_name=$_FILES['image']['tmp_name'];

if ($file_name) {
$name_file=explode(".", $file_name);
$ext=end($name_file);
$name_file=$name.date("mdHis_").'.'.$ext;

$full_path="../assets/image/technic/$name_file";
}


//Запчасти
$tp_sql="SELECT * FROM `Type_dev` WHERE `id`='$Type_dev'";
	$run_tp_sql=mysqli_query($con, $tp_sql);
	$row_tp = mysqli_fetch_array($run_tp_sql);
	$id_tp=$row_tp['id'];
	$name_tp=$row_tp['name'];
	$description=$row_tp['description'];
	$quantity_aces=$row_tp['quantity_aces'];

for ($i=1; $i <= $quantity_aces; $i++) {
	$new_dev="Type_dev_$i";
	$Type_dev_new=$_POST["$new_dev"];
	$dev_sqi_new="UPDATE `Accessories` SET `id_dev`='$id_techn' WHERE `id`='$Type_dev_new'";
	$str_dev="str_dev_$i";
	$str_dev=mysqli_query($con, $dev_sqi_new);
}


//Итогавая команда
$com_add_ws="INSERT INTO `technic`(`image`, `name`, `description`, `Type_dev`, `id_jobs`) VALUES ('$name_file','$name','$description','$Type_dev','$jobs')";

if ($reg) {
	if ($name && $description) {
		if ($rows_count=='0') {
			$run_add_ws = mysqli_query($con, $com_add_ws);
			if ($run_add_ws) {
				$run_quantity = mysqli_query($con, $quantity_type_mql);
				move_uploaded_file($file_tmp_name, $full_path);
				$file="dev.php";
			}
			else {
				$_SESSION['error_1']="Ошибка";
				$file="dev_comp.php";
			}
		}
		else {
			$_SESSION['error_1']="Этот адрес занят";
			$file="dev_comp.php";
		}
	}
	else {
		$_SESSION['error_1']="Заполните все поля";
		$file="dev_comp.php";
	}
}
header("Location:/$file");
?>