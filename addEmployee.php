<?php
	require_once "config/db.php";

	$title = "New Employee";
	require_once "includes/header.php";
?>
<main>
	<h1>Add New Employee</h1>
	<form action="addEmployee.php" method="POST">
		<div>
			<label for="firstname">First Name:</label>
			<input type="text" id="firstname" name="firstname" required>
		</div>
		<div>
			<label for="lastname">Last Name:</label>
			<input type="text" id="lastname" name="lastname" required>
		</div>
		<div>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
		</div>
		<div>
			<label for="phone">Phone:</label>
			<input type="tel" id="phone" name="phone" required>
		</div>
		<div>
			<label for="dept_id">Department ID:</label>
			<input type="number" id="dept_id" name="dept_id">
		</div>
		<div>
			<button type="submit">Add Employee</button>
		</div>
	</form>
</main>
<?php	require_once "includes/footer.php";	?>