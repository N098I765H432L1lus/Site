<?php
require_once 'view/header.html';
?>
<h5>Добавить пользователей</h5>
<form method="POST" action="controller/add_user.php" enctype="multipart/form-data">
	<input type="email" name="login" placeholder="Логин">
	<input type="text" name="surname" placeholder="Фамилия">
	<input type="text" name="name" placeholder="Имя">
	<input type="password" name="password" placeholder="Пароль">
	<label for="jobs"><h5>Рабочее место:</h5></label>
	<select name="jobs">
	<?php
	$jobs_sql="SELECT * FROM `Jobs`";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);

	while ($row_jobs = mysqli_fetch_array($run_jobs_sql)) {
		$id=$row_jobs['id'];
		$name=$row_jobs['name'];
		$id_w_shop=$row_jobs['id_w_shop'];

		$jobs_ws_sql="SELECT * FROM `Workshops` WHERE `id`='$id_w_shop'";
		$run_jobs_ws_sql=mysqli_query($con, $jobs_ws_sql);

		$row_jobs_ws = mysqli_fetch_array($run_jobs_ws_sql);
		$image_jobs_ws=$row_jobs_ws['image'];
		$name_jobs_ws=$row_jobs_ws['name'];
		$address_jobs_ws=$row_jobs_ws['address'];

		echo "<option value='$id'><h5>$name_jobs_ws $address_jobs_ws Место №$name</h5></option>";
	}


	$acce_sql="SELECT * FROM `Acceptance`";
	$run_acce_sql=mysqli_query($con, $acce_sql);

	while ($row_acce = mysqli_fetch_array($run_acce_sql)) {
		$id_acce=$row_acce['id'];
		$name_acce=$row_acce['name'];
		$name_acce=$row_acce['name'];
		$address_acce=$row_acce['address'];

		echo "<option value='$id_acce'><h5>$name_acce $address_acce </h5></option>";
	}
	?>
	</select>
	<label for="role"><h5>Роль:</h5></label>
	<select name="role">
	<option value='1'><h5>Адмиистратор</h5></option>
	<option value='5'><h5>Работник - ремонтник</h5></option>
	<option value='9'><h5>Работник на выдоче</h5></option>
	</select>
	<input type="submit" name="reg">
</form>
<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>

<table>
	<tr>
		<th>Логин</th>
		<th>Фамилия</th>
		<th>Имя</th>
		<th>Рабочее место</th>
		<th>Роль</th>
		<th>Действия</th>
	</tr>
	<?php
	$sql_user = "SELECT * FROM `users`";
	$run_sql_user = mysqli_query($con, $sql_user);

	while ($row_user = mysqli_fetch_array($run_sql_user)) {
		$id_user=$row_user['id'];
		$login_user=$row_user['login'];
		$surname_user=$row_user['surname'];
		$name_user=$row_user['name'];
		$jobs_user=$row_user['jobs_id'];
		$role_user=$row_user['role'];

		if ($role_user == '1') {$role_user = 'Адмиистратор';}
		if ($role_user == '5') {$role_user = 'Работник - ремонтник';}
		if ($role_user == '9') {$role_user = 'Работник на выдоче';}


		$sql_jobs = "SELECT * FROM `Jobs` WHERE `id`='$jobs_user'";
		$run_sql_jobs = mysqli_query($con, $sql_jobs);

		$row_jobs = mysqli_fetch_array($run_sql_jobs);
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
			<th>$login_user</th>
			<th>$surname_user</th>
			<th>$name_user</th>
			<th>$name_jobs_ws $address_jobs_ws Место №$name_jobs</th>
			<th>$role_user</th>
			<th><a href='controller/user_dell.php?id=$id_user'>Удалить</a></th>
			<th><a href='user_edit.php?id=$id_user'>Редактировать</a></th>
		</tr>
		";
	}
	?>
</table>
<?php
require_once 'view/footer.html';
?>