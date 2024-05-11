<?php
require_once 'view/header.html';
?>

<h5>Добавить деталь</h5>
<form method="POST" action="controller/acse_add.php" enctype="multipart/form-data">
	Фотография:<input type="file" name="image">
	<input type="text" name="id" placeholder="Серийный номер">
	<input type="text" name="name" placeholder="Название">
	<h5>Тип деталей:</h5>
	<select name="type_aces">
	<?php
	$tp_sql="SELECT * FROM `Type_aces`";
	$run_tp_sql=mysqli_query($con, $tp_sql);

	while ($row_tp = mysqli_fetch_array($run_tp_sql)) {
		$id_tp=$row_tp['id'];
		$name_tp=$row_tp['name'];
		$description_tp=$row_tp['description'];

		echo "<option value='$id_tp'><h5>$name_tp $description_tp</h5></option>";
	}
	?>
	</select>

	<h5>Место хранения:</h5>
	<?php
	$ws_sql="SELECT * FROM `Workshops`";
	$run_ws_sql=mysqli_query($con, $ws_sql);

	echo "<select name='ws'>";

	while ($row_ws = mysqli_fetch_array($run_ws_sql)) {
		$id_ws=$row_ws['id'];
		$name_ws=$row_ws['name'];
		$address_ws=$row_ws['address'];

		echo "<option value='$id_ws'><h5>$name_ws $address_ws</h5></option>";
	}
	echo "</select>";
	?>

	<input type="submit" name="reg">
</form>

<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>

<table>
	<tr>
		<th>Тип</th>
		<th>Изображение</th>
		<th>Серийный номер</th>
		<th>Название</th>
		<th>Адрес</th>
		<th>Действия</th>
	</tr>
	<?php
	$jobs_sql="SELECT * FROM `Accessories`";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);

	while ($row_aces = mysqli_fetch_array($run_jobs_sql)) {
		$id_aces=$row_aces['id'];
		$image_aces=$row_aces['images'];
		$name_aces=$row_aces['name'];
		$id_w_shop_aces=$row_aces['id_w_shop'];
		$id_type_aces_aces=$row_aces['id_type_aces'];

		$tp_sql_aces="SELECT * FROM `Type_aces` WHERE `id`='$id_type_aces_aces'";
		$run_tp_sql_aces=mysqli_query($con, $tp_sql_aces);
		$row_td_aces = mysqli_fetch_array($run_tp_sql_aces);
		$name_td_aces=$row_td_aces['name'];

		$ws_sql_aces="SELECT * FROM `Workshops` WHERE `id`='$id_w_shop_aces'";
		$run_ws_sql_aces=mysqli_query($con, $ws_sql_aces);
		$row_ws_aces = mysqli_fetch_array($run_ws_sql_aces);
		$name_ws_aces=$row_ws_aces['name'];
		$address_ws_aces=$row_ws_aces['address'];
		echo "
		<tr>
		<td>$name_td_aces</td>
		<td><div class='logo'><img src='assets/image/Accessories/$image_aces'></div></td>
		<td>$id_aces</td>
		<td>$name_aces</td>
		<td>$name_ws_aces $address_ws_aces</td>
		<th><a href='controller/acse_dell.php?id=$id_aces'>Удалить</a></th>
		<th><a href=ws_edit.php?id=$id_aces>Редактировать</a></th>
		</tr>
		";
	}
	?>
</table>
<?php
require_once 'view/footer.html';
?>