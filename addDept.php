<?php
	require_once "config/db.php";

	$message = "";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = trim($_POST['department_name'] ?? '');

		if (!empty($name)) {
			try {
				$stmt = $pdo->prepare("INSERT INTO departments (department_name) VALUES (?)");
				$stmt->execute([$name]);
				$message = "Department added successfully!";
			} catch (\PDOException $e) {
				$message = "Error adding department: " . $e->getMessage();
			}
		} else {
			$message = "Please enter a department name.";
		}
	}

	$title = "New Department";
	require_once "includes/header.php";
?>
<main>
	<h1>Add New Department</h1>

	<?php if (!empty($message)): ?>
		<div class="alert"><?php echo htmlspecialchars($message); ?></div>
	<?php endif; ?>

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
<?php require_once "includes/footer.php"; ?>