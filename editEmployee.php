<?php
	require_once "config/db.php";

	$title = "Modify Employee Data";
	require_once "includes/header.php";
?>
<main>
	<h1>Modify Employee Data</h1>
	<form action="editEmployee.php" method="POST">
		<div>
			<label for="employee_id">Employee ID:</label>
			<input type="number" id="employee_id" name="employee_id" min="1" step="1" required>
		</div>
		<div>
			<label for="firstname">First Name:</label>
			<input type="text" id="firstname" name="firstname">
		</div>
		<div>
			<label for="lastname">Last Name:</label>
			<input type="text" id="lastname" name="lastname">
		</div>
		<div>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email">
		</div>
		<div>
			<label for="phone">Phone:</label>
			<input type="tel" id="phone" name="phone">
		</div>
		<div>
			<label for="dept_id">Department ID:</label>
			<input type="number" id="dept_id" name="dept_id" min="1" step="1">
		</div>
		<div>
			<button type="submit">Update Employee</button>
		</div>
	</form>
</main>
<?php	require_once "includes/footer.php";	?>