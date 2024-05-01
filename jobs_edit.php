<?php
require_once 'view/header.html';

$edit_id = $_GET['id'];

$jobs_sql="SELECT * FROM `Jobs` WHERE `id`='$edit_id'";
	$run_jobs_sql=mysqli_query($con, $jobs_sql);

	$row_jobs = mysqli_fetch_array($run_jobs_sql);
	$id_jobs=$row_jobs['id'];
	$name_jobs=$row_jobs['name'];
	$id_w_shop_jobs=$row_jobs['id_w_shop'];

	$adr_sql="SELECT * FROM `Workshops`";
	$run_adr_sql=mysqli_query($con, $adr_sql);
	$row_adr = mysqli_fetch_array($run_adr_sql);
	$adr=$row_adr['address'];

echo "
<h5>Добавить рабочие места</h5>
<form method='POST' action='controller/jobs_edit.php?id=$id_jobs' enctype='multipart/form-data'>
	<input type='text' name='num_jobs' placeholder='Номер места' value='$name_jobs'>
	<h5>Адресс: $adr</h5>
	<select name='ws'>
";

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

<?php
require_once 'view/footer.html';
?>