<?php
require_once 'view/header.html';
$Type_dev=$_POST['Type_dev']
?>
<h5>Добавить деталь</h5>
<?php
echo "<form method='POST' action='controller/add_dev.php?Type_dev=$Type_dev' enctype='multipart/form-data'>";
?>
	Фотография:<input type="file" name="image">
	<input type="text" name="name" placeholder="Название">
	<input type="text" name="description" placeholder="Описание">
	<h5>Тип Комплектуюшие:</h5>

	<?php
	$tp_sql="SELECT * FROM `Type_dev` WHERE `id`='$Type_dev'";
	$run_tp_sql=mysqli_query($con, $tp_sql);
	$row_tp = mysqli_fetch_array($run_tp_sql);
	$id_tp=$row_tp['id'];
	$name_tp=$row_tp['name'];
	$description=$row_tp['description'];
	$quantity_aces=$row_tp['quantity_aces'];
	$quantity=$row_tp['quantity'];

	for ($i=1; $i <= $quantity_aces; $i++) {
		echo "<select name='Type_dev_$i'>";
		$jobs_sql="SELECT * FROM `Accessories`";
		$run_jobs_sql=mysqli_query($con, $jobs_sql);


	while ($row_aces = mysqli_fetch_array($run_jobs_sql)) {
		$id_aces=$row_aces['id'];
		$image_aces=$row_aces['images'];
		$name_aces=$row_aces['name'];
		$id_w_shop_aces=$row_aces['id_w_shop'];
		$id_type_aces_aces=$row_aces['id_type_aces'];
		$id_dev_aces=$row_aces['id_dev'];

		$out_user = "SELECT `id` FROM `Accessories` WHERE `id_dev`='$id_dev_aces'";
		$run_out_user = mysqli_query($con, $out_user);
		$rows_count = mysqli_num_rows($run_out_user);

		if ($rows_count=='0') {
		$tp_sql_aces="SELECT * FROM `Type_aces` WHERE `id`='$id_type_aces_aces'";
		$run_tp_sql_aces=mysqli_query($con, $tp_sql_aces);
		$row_td_aces = mysqli_fetch_array($run_tp_sql_aces);
		$name_td_aces=$row_td_aces['name'];

		$ws_sql_aces="SELECT * FROM `Workshops` WHERE `id`='$id_w_shop_aces'";
		$run_ws_sql_aces=mysqli_query($con, $ws_sql_aces);
		$row_ws_aces = mysqli_fetch_array($run_ws_sql_aces);
		$name_ws_aces=$row_ws_aces['name'];
		$address_ws_aces=$row_ws_aces['address'];

		echo "<option value='$id_aces'>$name_td_aces $name_aces Серийный номер:$id_aces Расположение:$address_ws_aces $name_ws_aces</option>";

		}
	}
		echo "</select>";
		echo "Type_dev_$i";
	}

	/*while () {



		echo "<option value='$id_tp'><h5>$name_tp $description количеств: $quantity</h5></option>";
	}*/
	?>

	<input type="submit" name="reg">
</form>

<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>

<!--<table>
	<tr>
		<th>Тип</th>
		<th>Изоброжение</th>
		<th>Серийный номер</th>
		<th>Название</th>
		<th>Адрес</th>
		<th>Действия</th>
	</tr>
	<?php/*
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
	}*/
	?>
</table>-->
<?php
require_once 'view/footer.html';
?>