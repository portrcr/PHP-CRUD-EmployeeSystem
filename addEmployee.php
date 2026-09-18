<?php
	require_once "config/db.php";

	$message = "";

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$firstname = $_POST['firstname'] ?? '';
		$lastname  = $_POST['lastname'] ?? '';
		$email     = $_POST['email'] ?? '';
		$phone     = $_POST['phone'] ?? '';
		$dept_id   = !empty($_POST['dept_id']) ? $_POST['dept_id'] : null;

		if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone)) {
			try {
				$sql = "INSERT INTO employees (firstname, lastname, email, phone, dept_id) VALUES (?, ?, ?, ?, ?)";
				$stmt = $pdo->prepare($sql);
				$stmt->execute([$firstname, $lastname, $email, $phone, $dept_id]);
				$message = "Employee added successfully!";
			} catch (\PDOException $e) {
				$message = "Error adding employee: " . $e->getMessage();
			}
		} else {
			$message = "Please fill in all required fields.";
		}
	}

	$title = "New Employee";
	require_once "includes/header.php";
?>
<main>
	<h1>Add New Employee</h1>

	<?php if (!empty($message)): ?>
		<div class="alert"><?php echo htmlspecialchars($message); ?></div>
	<?php endif; ?>

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
			<input type="number" id="dept_id" name="dept_id" min="1" step="1">
		</div>
		<div>
			<button type="submit">Add Employee</button>
		</div>
	</form>
</main>
<?php require_once "includes/footer.php"; ?>