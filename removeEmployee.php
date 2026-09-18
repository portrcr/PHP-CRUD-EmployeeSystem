<?php
	require_once "config/db.php";

	$message = "";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$employee_id = $_POST['employee_id'] ?? '';

		if (!empty($employee_id)) {
			try {
				$stmt = $pdo->prepare("DELETE FROM employees WHERE employee_id = ?");
				$stmt->execute([$employee_id]);

				if ($stmt->rowCount() > 0) {
					$message = "Employee removed successfully!";
				} else {
					$message = "Employee ID not found.";
				}
			} catch (\PDOException $e) {
				$message = "Error removing employee: " . $e->getMessage();
			}
		} else {
			$message = "Please enter an Employee ID.";
		}
	}

	$title = "Remove an Employee";
	require_once "includes/header.php";
?>
<main>
	<h1>Remove an Employee</h1>

	<?php if (!empty($message)): ?>
		<div class="alert"><?php echo htmlspecialchars($message); ?></div>
	<?php endif; ?>

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
<?php require_once "includes/footer.php"; ?>