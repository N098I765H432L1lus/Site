<?php
require_once 'view/header.html';
?>


	<h5>Тип техники:</h5>
<form method="POST" action="dev_comp.php" enctype="multipart/form-data">
	Фотография:<input type="file" name="image">
	<input type="text" name="num_phone" placeholder="Номер телефона"><br>
	<input type="text" name="surname" placeholder="Фамилия"><br>
	<input type="text" name="name" placeholder="Имя"><br>
	<input type="text" name="patronymic" placeholder="Отчество"><br>
	<select name="Type_dev">
	<?php
	$tp_sql="SELECT * FROM `Type_dev`";
	$run_tp_sql=mysqli_query($con, $tp_sql);

	while ($row_tp = mysqli_fetch_array($run_tp_sql)) {
		$id_tp=$row_tp['id'];
		$name_tp=$row_tp['name'];
		$description=$row_tp['description'];
		$quantity_aces=$row_tp['quantity_aces'];
		$quantity=$row_tp['quantity'];
		echo "<option value='$id_tp'><h5>$name_tp $description количеств: $quantity</h5></option>";
	}
	?>
	</select><br>
	<input type="submit" name="reg">
</form>

<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>


<!--	<?php
	$tp_sql_aces="SELECT * FROM `technic`";
	$run_tp_sql_aces=mysqli_query($con, $tp_sql_aces);

	while ($row_td_aces = mysqli_fetch_array($run_tp_sql_aces)) {
		$id_td_aces=$row_td_aces['id'];
		$image_td_aces=$row_td_aces['image'];
		$name_td_aces=$row_td_aces['name'];
		$description_td_aces=$row_td_aces['description'];
		$Type_dev=$row_td_aces['Type_dev'];

		echo "<div class='logo'><img src='assets/image/technic/$image_td_aces'></div>$name_td_aces Описание $description_td_aces
		<a href='controller/dell_dev.php?id=$id_td_aces'>Удалить</a>
		<a href='acse_edit.php?id=$id_td_aces'>Редактировать</a><br>
		Запчасти:<br>";

		$tp_sql="SELECT * FROM `Type_dev` WHERE `id`='$Type_dev'";
		$run_tp_sql=mysqli_query($con, $tp_sql);
		$row_tp = mysqli_fetch_array($run_tp_sql);
		$quantity_aces=$row_tp['quantity_aces'];

		$jobs_sql="SELECT * FROM `Accessories` WHERE `id_dev`='$id_td_aces'";
		$run_jobs_sql=mysqli_query($con, $jobs_sql);

		for ($i=1; $i <= $quantity_aces; $i++) {
			$row_jobs = mysqli_fetch_array($run_jobs_sql);
			$id_jobs=$row_jobs['id'];
			$images_jobs=$row_jobs['images'];
			$name_jobs=$row_jobs['name'];
			echo "<div class='logo'><img src='assets/image/Accessories/$images_jobs'></div>$id_jobs $name_jobs<br>";
		}
	}
	?>
</table>-->

<?php
require_once 'view/footer.html';
?>