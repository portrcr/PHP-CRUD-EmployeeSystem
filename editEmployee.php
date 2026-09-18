<?php
	require_once "config/db.php";

	$message = "";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$employee_id = $_POST['employee_id'] ?? '';
		$firstname   = $_POST['firstname'] ?? '';
		$lastname    = $_POST['lastname'] ?? '';
		$email       = $_POST['email'] ?? '';
		$phone       = $_POST['phone'] ?? '';
		$dept_id     = !empty($_POST['dept_id']) ? $_POST['dept_id'] : null;

		if (!empty($employee_id) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone)) {
			try {
				$sql = "UPDATE employees SET firstname = ?, lastname = ?, email = ?, phone = ?, dept_id = ? WHERE employee_id = ?";
				$stmt = $pdo->prepare($sql);
				$stmt->execute([$firstname, $lastname, $email, $phone, $dept_id, $employee_id]);

				if ($stmt->rowCount() > 0) {
					$message = "Employee updated successfully!";
				} else {
					$message = "No changes made or employee not found.";
				}
			} catch (\PDOException $e) {
				$message = "Error updating employee: " . $e->getMessage();
			}
		} else {
			$message = "Please fill in all required fields.";
		}
	}

	$title = "Modify Employee Data";
	require_once "includes/header.php";
?>
<main>
	<h1>Modify Employee Data</h1>

	<?php if (!empty($message)): ?>
		<div class="alert"><?php echo htmlspecialchars($message); ?></div>
	<?php endif; ?>

	<form action="editEmployee.php" method="POST">
		<div>
			<label for="employee_id">Employee ID:</label>
			<input type="number" id="employee_id" name="employee_id" min="1" step="1" required>
		</div>
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
			<input type="number" id="dept_id" name="dept_id" min="1" step="1">
		</div>
		<div>
			<button type="submit">Update Employee</button>
		</div>
	</form>
</main>
<?php require_once "includes/footer.php"; ?>