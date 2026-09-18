<?php
	require_once "config/db.php";

	$message = "";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$deptId = $_POST['department_id'] ?? '';

		if (!empty($deptId)) {
			try {
				$stmt = $pdo->prepare("DELETE FROM departments WHERE department_id = ?");
				$stmt->execute([$deptId]);

				if ($stmt->rowCount() > 0) {
					$message = "Department removed successfully!";
				} else {
					$message = "Department ID not found.";
				}
			} catch (\PDOException $e) {
				$message = "Error: Cannot remove department while employees are assigned to it.";
			}
		} else {
			$message = "Please enter a Department ID.";
		}
	}

	$title = "Remove Department";
	require_once "includes/header.php";
?>
<main>
	<h1>Remove Department</h1>

	<?php if (!empty($message)): ?>
		<div class="alert"><?php echo htmlspecialchars($message); ?></div>
	<?php endif; ?>

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
<?php require_once "includes/footer.php"; ?>