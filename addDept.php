<?php
	require_once "config/db.php";

	$title = "New Department";
	require_once "includes/header.php";
?>
<main>
	<h1>Add New Department</h1>
	<form action="addDept.php" method="POST">
		<div>
			<label for="department_name">Department Name:</label>
			<input type="text" id="department_name" name="department_name" required>
		</div>
		<div>
			<button type="submit">Add Department</button>
		</div>
	</form>
</main>
<?php	require_once "includes/footer.php";	?>