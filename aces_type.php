<?php
require_once 'view/header.html';
?>

<h5>Типы запчастей-расходниками</h5>
<form method="POST" action="controller/add_aces.php" enctype="multipart/form-data">
	<input type="text" name="name" placeholder="Название">
	<input type="submit" name="reg">
</form>
<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>


	<?php
	$tp_sql_aces="SELECT * FROM `Type_aces`";
	$run_tp_sql_aces=mysqli_query($con, $tp_sql_aces);

	while ($row_td_aces = mysqli_fetch_array($run_tp_sql_aces)) {
		$id_td_aces=$row_td_aces['id'];
		$name_td_aces=$row_td_aces['name'];
		$description_td_aces=$row_td_aces['description'];
		$quantity_td_aces=$row_td_aces['quantity'];


		$jobs_sql="SELECT * FROM `Accessories` WHERE `id_type_aces`='$id_td_aces'";
		$run_jobs_sql=mysqli_query($con, $jobs_sql);
		echo "
		<table>
		<tr>
			<th>Изоброжение</th>
			<th>Название</th>
			<th>Адрес</th>
		</tr>";

		echo "$name_td_aces количество: $quantity_td_aces
		<a href='controller/dell_aces_type.php?id=$id_td_aces'>Удалить</a>
		<a href='acse_edit.php?id=$id_td_aces'>Редактировать</a>";


		while ($row_aces = mysqli_fetch_array($run_jobs_sql)) {
			$id_aces=$row_aces['id'];
			$image_aces=$row_aces['images'];
			$name_aces=$row_aces['name'];
			$id_w_shop_aces=$row_aces['id_w_shop'];
			$id_type_aces_aces=$row_aces['id_type_aces'];

			$ws_sql_aces="SELECT * FROM `Workshops` WHERE `id`='$id_w_shop_aces'";
			$run_ws_sql_aces=mysqli_query($con, $ws_sql_aces);
			$row_ws_aces = mysqli_fetch_array($run_ws_sql_aces);
			$name_ws_aces=$row_ws_aces['name'];
			$address_ws_aces=$row_ws_aces['address'];

			echo "
			<tr>
				<td><div class='logo'><img src='assets/image/Accessories/$image_aces'></div></td>
				<td>$name_aces</td>
				<td>$name_ws_aces $address_ws_aces</td>
			</tr>
		";
		}
	}
	?>
</table>
<?php
require_once 'view/footer.html';
?>