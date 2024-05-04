<?php
include_once 'db.php';

$id=$_GET['id'];

$jobs_sql="SELECT * FROM `Accessories` WHERE `id`='$id'";
$run_jobs_sql=mysqli_query($con, $jobs_sql);
$row_aces = mysqli_fetch_array($run_jobs_sql);
$id_type_aces_aces=$row_aces['id_type_aces'];


$del_sql = "DELETE FROM `Accessories` WHERE `id` = '$id'";
$run_del_sql = mysqli_query($con, $del_sql);


$quantity_mql="SELECT * FROM `Type_aces` WHERE `id`='$id_type_aces_aces'";
$run_quantity= mysqli_query($con, $quantity_mql);

$row_quantity = mysqli_fetch_array($run_quantity);
$quantity = $row_quantity['quantity'];

$quantity -= 1;
$quantity_update="UPDATE `Type_aces` SET `quantity`='$quantity' WHERE `id`='$id_type_aces_aces'";
if ($run_del_sql) {
	$run_quantity = mysqli_query($con, $quantity_update);
	$run_user_del_sql = mysqli_query($con, $user_del_sql);
	$file="aces.php";
}
else {
	$_SESSION['error']="Ошибка";
	$file="aces.php";
}

header("Location:/$file");
?>