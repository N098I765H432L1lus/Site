<?php
include_once 'db.php';

$id=$_GET['id'];

$del_sql = "DELETE FROM `users` WHERE `id`='$id'";
$run_del_sql = mysqli_query($con, $del_sql);

if ($run_del_sql) {
	$file="add_user.php";
}
else {
	$_SESSION['error']="Ошибка";
	$file="add_user.php";
}

header("Location:/$file");
?>