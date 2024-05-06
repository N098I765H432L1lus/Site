<?php
require_once 'view/header.html';
?>


	<h5>Тип техники:</h5>
<form method="POST" action="dev_comp.php" enctype="multipart/form-data">
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
	</select>
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