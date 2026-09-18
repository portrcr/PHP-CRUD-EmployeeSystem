<?php
	require_once "config/db.php";

	$title = "Remove Department";
	require_once "includes/header.php";
?>
<main>
	<h1>Remove Department</h1>
	<form action="removeDept.php" method="POST">
		<div>
			<label for="department_id">Department ID:</label>
			<input type="number" id="department_id" name="department_id" min="1" step="1" required>
		</div>
		<div>
			<button type="submit">Remove Department</button>
		</div>
	</form>
</main>
<?php	require_once "includes/footer.php";	?>