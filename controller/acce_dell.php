<?php
include_once 'db.php';

$id=$_GET['id'];


$del_sql = "DELETE FROM `Acceptance` WHERE `id` = '$id'";
$run_del_sql = mysqli_query($con, $del_sql);


if ($run_del_sql) {

	$user_del_sql = "DELETE FROM `users` WHERE `jobs_id`='$id_ws'";

	$run_user_del_sql = mysqli_query($con, $user_del_sql);
	$file="add_ws.php";
}
else {
	$_SESSION['error']="Ошибка";
	$file="add_ws.php";
}

header("Location:/$file");
?>