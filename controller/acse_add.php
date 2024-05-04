<?php
include_once 'db.php';

$id=$_POST['id'];
$name=$_POST['name'];
$type_aces=$_POST['type_aces'];
$ws=$_POST['ws'];
$reg=$_POST['reg'];

$out_user = "SELECT `id` FROM `Accessories` WHERE `id`='$id'";
$run_out_user = mysqli_query($con, $out_user);
$rows_count = mysqli_num_rows($run_out_user);


$file_name=$_FILES['image']['name'];
$file_tmp_name=$_FILES['image']['tmp_name'];

$name_file=explode(".", $file_name);
$ext=end($name_file);
$name_file=$name.date("mdHis_").'.'.$ext;

$full_path="../assets/image/Accessories/$name_file";


$com_add_ws="INSERT INTO `Accessories`(`id`, `images`, `name`, `id_w_shop`, `id_type_aces`) VALUES ('$id','$name_file','$name','$ws','$type_aces')";


$quantity_mql="SELECT * FROM `Type_aces` WHERE `id`='$type_aces'";
$run_quantity= mysqli_query($con, $quantity_mql);
echo "$quantity_mql";
$row_quantity = mysqli_fetch_array($run_quantity);
$quantity = $row_quantity['quantity'];

$quantity += 1;
$quantity_update="UPDATE `Type_aces` SET `quantity`='$quantity' WHERE `id`='$type_aces'";

if ($reg) {
	if ($name && $id && $type_aces && $ws) {
		if ($rows_count=='0') {
			$run_add_ws = mysqli_query($con, $com_add_ws);
			if ($run_add_ws) {
				$run_quantity = mysqli_query($con, $quantity_update);
				move_uploaded_file($file_tmp_name, $full_path);
				$file="aces.php";
			}
			else {
				$_SESSION['error']="Ошибка";
				$file="aces.php";
			}
		}
		else {
			$_SESSION['error']="Этот адрес занят";
			$file="aces.php";
		}
	}
	else {
		$_SESSION['error']="Заполните все поля";
		$file="aces.php";
	}
}
header("Location:/$file");
?>