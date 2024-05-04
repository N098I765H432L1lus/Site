<?php
include_once 'db.php';

$id=$_GET['id'];

$del_sql = "DELETE FROM `Type_aces` WHERE `id` = '$id'";
$run_del_sql = mysqli_query($con, $del_sql);

$upd_acec = "UPDATE `Accessories` SET `id_type_aces`='3' WHERE `id_type_aces`='$id'"

if ($id='3') {
	$_SESSION['error']="Незълзя удалить(Важный-Не редоктируемый)";
	$file="aces.php";
}

else {
if ($run_del_sql) {
	$run_upd_acec = mysqli_query($con, $upd_acec);
	$file="aces_type.php";
}
else {
	$_SESSION['error']="Ошибка";
	$file="aces.php";
}
}
header("Location:/$file");
?>