<?php
require_once 'view/header.html';

$id = $_GET['id'];
$jobs_sql="SELECT * FROM `Type_aces` WHERE `id`='$id'";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);

	$row_ws = mysqli_fetch_array($run_jobs_sql);
	$id_ws=$row_ws['id'];
	$name=$row_ws['name'];
	$quantity=$row_ws['quantity'];
?>

<h5>Редактировать тип запчестей-расходников</h5>
<?php echo "
<form method='POST' action='controller/acse_edit.php?id=$id_ws' enctype='multipart/form-data'>
	<input type='text' name='name' placeholder='Название типа расходников' value='$name'>
	<h5>Количество деталий:$quantity</h5>
	<input type='submit' name='reg'>
	<a href='aces_type.php'>отмена</a>
</form>";?>
<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>

<?php
require_once 'view/footer.html';
?>