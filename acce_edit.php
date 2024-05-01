<?php
require_once 'view/header.html';

$id = $_GET['id'];
$jobs_sql="SELECT * FROM `Acceptance` WHERE `id`='$id'";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);

	$row_ws = mysqli_fetch_array($run_jobs_sql);
	$id_ws=$row_ws['id'];
	$image=$row_ws['image'];
	$name=$row_ws['name'];
	$address=$row_ws['address'];
?>

<h5>Редактировать мастерскую</h5>
<?php echo "
<form method='POST' action='controller/acce_edit.php?id=$id_ws' enctype='multipart/form-data'>
	<div class='logo'><img src='assets/image/Acceptance/$image'></div>
	Фотография:<input type='file' name='image' value='$image'>
	<input type='text' name='name' placeholder='Название места выдачи' value='$name'>
	<input type='text' name='address' placeholder='Адрес места выдачи' value='$address'>
	<input type='submit' name='reg'>
</form>";?>
<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>

<?php
require_once 'view/footer.html';
?>