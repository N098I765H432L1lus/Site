<?php
include_once 'db.php';

$id=$_GET['id'];


$del_sql = "DELETE FROM `Jobs` WHERE `id` = '$id'";
$run_del_sql = mysqli_query($con, $del_sql);


if ($run_del_sql) {

	$jobs_sql="SELECT * FROM `Jobs` WHERE `id`='$id'";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);
	$row_ws = mysqli_fetch_array($run_jobs_sql);
	$id_ws=$row_ws['id'];

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