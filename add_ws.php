<?php
require_once 'view/header.html';
?>
<h5>Добавить мастерскую</h5>
<form method="POST" action="controller/add_ws.php" enctype="multipart/form-data">
	Фотография:<input type="file" name="image">
	<input type="text" name="name" placeholder="Название мастерской">
	<input type="text" name="address" placeholder="Адрес мастерской">
	<input type="submit" name="reg">
</form>
<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>
<table>
	<tr>
		<th>Изоброжение</th>
		<th>Название</th>
		<th>Адрес</th>
		<th>Действия</th>
	</tr>
	<?php
	$jobs_sql="SELECT * FROM `Workshops`";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);

	while ($row_ws = mysqli_fetch_array($run_jobs_sql)) {
		$id_ws=$row_ws['id'];
		$image=$row_ws['image'];
		$name=$row_ws['name'];
		$address=$row_ws['address'];

		echo "
		<tr>
		<td><div class='logo'><img src='assets/image/Workshops/$image'></div></td>
		<td>$name</td>
		<td>$address</td>
		<th><a href='controller/ws_dell.php?id=$id_ws'>Удалить</a></th>
		<th><a href=ws_edit.php?id=$id_ws>Редактировать</a></th>
		</tr>
		";
	}
	?>
</table>


<h5>Добавить рабочие места</h5>
<form method="POST" action="controller/add_jobs.php" enctype="multipart/form-data">
	<input type="text" name="num_jobs" placeholder="Номер места">
	<select name="ws">
	<?php
	$ws_sql="SELECT * FROM `Workshops`";
	$run_ws_sql=mysqli_query($con, $ws_sql);

	while ($row_ws = mysqli_fetch_array($run_ws_sql)) {
		$id=$row_ws['id'];
		$image=$row_ws['image'];
		$name=$row_ws['name'];
		$address=$row_ws['address'];

		echo "<option value='$id'><h5>$name $address</h5></option>";
	}
	?>
	</select>
	<input type="submit" name="reg">
</form>
<div class="error"><?php
	$error=$_SESSION['error_2'];
	echo "$error";
	unset($_SESSION['error_2']);
?></div>
<table>
	<tr>
		<th>Номер места</th>
		<th>Изоброжение</th>
		<th>Название</th>
		<th>Адрес</th>
		<th>Действия</th>
	</tr>

	<?php
	$jobs_sql="SELECT * FROM `Jobs`";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);

	while ($row_jobs = mysqli_fetch_array($run_jobs_sql)) {
		$id_jobs=$row_jobs['id'];
		$name_jobs=$row_jobs['name'];
		$id_w_shop=$row_jobs['id_w_shop'];

		$jobs_ws_sql="SELECT * FROM `Workshops` WHERE `id`='$id_w_shop'";
		$run_jobs_ws_sql=mysqli_query($con, $jobs_ws_sql);

		$row_jobs_ws = mysqli_fetch_array($run_jobs_ws_sql);
		$image_jobs_ws=$row_jobs_ws['image'];
		$name_jobs_ws=$row_jobs_ws['name'];
		$address_jobs_ws=$row_jobs_ws['address'];

		echo "
		<tr>
		<td>$name_jobs</td>
		<td><div class='logo'><img src='assets/image/Workshops/$image_jobs_ws'></div></td>
		<td>$name_jobs_ws</td>
		<td>$address_jobs_ws</td>
		<th><a href='controller/jobs_dell.php?id=$id_ws'>Удалить</a></th>
		<th><a href=jobs_edit.php?id=$id_ws>Редактировать</a></th>
		</tr>
		";
	}
	?>

</table>


<h5>Добавить место выдочи</h5>
<form method="POST" action="controller/add_acce.php" enctype="multipart/form-data">
	Фотография<input type="file" name="image">
	<input type="text" name="name" placeholder="Название">
	<input type="text" name="address" placeholder="Адрес">
	<input type="submit" name="reg">
</form>
<div class="error"><?php
	$error=$_SESSION['error_1'];
	echo "$error";
	unset($_SESSION['error_1']);
?></div>
<table>
	<tr>
		<th>Изображение</th>
		<th>Название</th>
		<th>Адрес</th>
		<th>Действия</th>
	</tr>

	<?php
	$acce_sql="SELECT * FROM `Acceptance`";
	$run_acce_sql=mysqli_query($con, $acce_sql);

	while ($row_acce = mysqli_fetch_array($run_acce_sql)) {
		$id_acce=$row_acce['id'];
		$image_acce=$row_acce['image'];
		$name_acce=$row_acce['name'];
		$address_acce=$row_acce['address'];

		echo "
		<tr>
		<td><div class='logo'><img src='assets/image/Acceptance/$image_acce'></div></td>
		<td>$name_acce</td>
		<td>$address_acce</td>
		<th><a href='controller/acce_dell.php?id=$id_acce'>Удалить</a></th>
		<th><a href=acce_edit.php?id=$id_acce>Редактировать</a></th>
		</tr>
		";
	}
	?>

</table>
<?php
require_once 'view/footer.html';
?>