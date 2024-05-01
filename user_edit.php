<?php
require_once 'view/header.html';

$id=$_GET['id'];

$sql_user = "SELECT * FROM `users` WHERE `id`='$id'";
$run_sql_user = mysqli_query($con, $sql_user);

$row_user = mysqli_fetch_array($run_sql_user);
$id_user=$row_user['id'];
$login_user=$row_user['login'];
$surname_user=$row_user['surname'];
$name_user=$row_user['name'];
$pswd_user=$row_user['password'];
$jobs_user=$row_user['jobs_id'];
$role_user=$row_user['role'];
?>

<h5>Добавить пользователей</h5>
<?php echo "<form method='POST' action='controller/user_edit.php?id=$id_user' enctype='multipart/form-data'>
	<input type='email' name='login' placeholder='Логин' value='$login_user'>
	<input type='text' name='surname' placeholder='Фамилия' value='$surname_user'>
	<input type='text' name='name' placeholder='Имя' value='$name_user'>
	<input type='password' name='password' placeholder='Пароль' value='$pswd_user'>";?>
	<?php
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
		echo "<label for='jobs'><h5>Рабочее место: $name_jobs_ws $address_jobs_ws Место №$name_jobs</h5></label>"; ?>
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
	?>
	</select>
	<?php
	if ($role_user=='1') {$role_user='Адмиистратор';}
	if ($role_user=='5') {$role_user='Работник - ремонтник';}
	if ($role_user=='9') {$role_user='Работник на выдоче';}
	echo "<label for='role'><h5>Роль: $role_user</h5></label>";?>
	<select name="role">
	<option value='1'><h5>Адмиистратор</h5></option>
	<option value='5'><h5>Работник - ремонтник</h5></option>
	<option value='9'><h5>Работник на выдоче</h5></option>
	</select>
	<a href="add_user.php">Отмена<h5></h5></a>
	<input type="submit" name="reg">
</form>
<div class="error"><?php
	$error=$_SESSION['error'];
	echo "$error";
	unset($_SESSION['error']);
?></div>

<?php
require_once 'view/footer.html';
?>