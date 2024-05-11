<?php
require_once 'view/header.html';
?>

<h5>Типы запчастей-расходниками</h5>
<form method="POST" action="controller/add_type_dev.php" enctype="multipart/form-data">
	<input type="text" name="name" placeholder="Название">
	<input type="text" name="description" placeholder="Описание">
	<input type="text" name="quantity_aces" placeholder="Количество деталей">
	<input type="submit" name="reg">
</form>
<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>


	<?php
	$tp_sql_aces="SELECT * FROM `Type_dev`";
	$run_tp_sql_aces=mysqli_query($con, $tp_sql_aces);

	while ($row_td_aces = mysqli_fetch_array($run_tp_sql_aces)) {
		$id_td_aces=$row_td_aces['id'];
		$name_td_aces=$row_td_aces['name'];
		$description_td_aces=$row_td_aces['description'];
		$quantity_td_aces=$row_td_aces['quantity_aces'];
		$quantity_td=$row_td_aces['quantity'];


		$jobs_sql="SELECT * FROM `technic` WHERE `Type_dev`='$id_td_aces'";
		$run_jobs_sql=mysqli_query($con, $jobs_sql);
		echo "
		<table>
		<tr>
			<th>Изображение</th>
			<th>Название</th>
			<th>Описание</th>
			<th>Количество запчастей</th>
		</tr>";

		echo "$name_td_aces количество: $quantity_td
		<a href='controller/dell_aces_type.php?id=$id_td_aces'>Удалить</a>
		<a href='acse_edit.php?id=$id_td_aces'>Редактировать</a>";


		while ($row_aces = mysqli_fetch_array($run_jobs_sql)) {
			$id_aces=$row_aces['id'];
			$image_aces=$row_aces['image'];
			$name_aces=$row_aces['name'];
			$description_aces=$row_aces['description'];
			$id_type_aces_aces=$row_aces['id_type_aces'];

			echo "
			<tr>
				<td><div class='logo'><img src='assets/image/technic/$image_aces'></div></td>
				<td>$name_aces</td>
				<td>$description_aces</td>
				<td>$quantity_td_aces</td>
			</tr>
		";
		}
	}
	?>
</table>
<?php
require_once 'view/footer.html';
?>