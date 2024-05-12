<?php
include_once 'db.php';

$id=$_GET['id'];

$del_sql = "DELETE FROM `technic` WHERE `id` = '$id'";
//$run_del_sql = mysqli_query($con, $del_sql);

//Количество
//поиск
$sel_typ_tehn_dev_sql = "SELECT * FROM `technic` WHERE `id`='$id'";
$run_typ_tehn_dev_sql = mysqli_query($con, $sel_typ_tehn_dev_sql);
$row_t_d = mysqli_fetch_array($run_typ_tehn_dev_sql);
$Type_dev = $row_t_d['Type_dev'];
//Изменение
$quantity_ply_type_mql="SELECT * FROM `Type_dev` WHERE `id`='$Type_dev'";
$run_quantity_sql=mysqli_query($con, $quantity_ply_type_mql);
$row_quantity = mysqli_fetch_array($run_quantity_sql);
$id_tp=$row_quantity['id'];
$name_tp=$row_quantity['name'];
$description=$row_quantity['description'];
$quantity_aces=$row_quantity['quantity_aces'];
$quantity = $row_quantity['quantity'];
$quantity -= 1;
$quantity_type_mql="UPDATE `Type_dev` SET `quantity` = '$quantity' WHERE `Type_dev`.`id` = '$Type_dev'";


//детали
$upd_aces = "UPDATE `Accessories` SET `id_dev`='3' WHERE `id_dev`='$id'";

if ($id='3') {
	$_SESSION['error']="Нельзя удалить(Важный-Не редоктируемый)";
	$file="dev.php";
}
else {
if ($run_del_sql) {
	$run_qua_acec = mysqli_query($con, $quantity_type_mql);
	$run_upd_aces = mysqli_query($con, $upd_aces);
	$file="dev.php";
}
else {
	$_SESSION['error']="Ошибка";
	$file="dev.php";
}
}
header("Location:/$file");
?>