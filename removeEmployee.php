<?php
	require_once "config/db.php";

	$title = "Remove an Employee";
	require_once "includes/header.php";
?>
<main>
	<h1>Remove an Employee</h1>
	<form action="removeEmployee.php" method="POST">
		<div>
			<label for="employee_id">Employee ID:</label>
			<input type="number" id="employee_id" name="employee_id" min="1" step="1" required>
		</div>
		<div>
			<button type="submit">Remove Employee</button>
		</div>
	</form>
</main>
<?php	require_once "includes/footer.php";	?>