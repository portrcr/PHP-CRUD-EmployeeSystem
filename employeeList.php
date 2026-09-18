<?php
	require_once "config/db.php";

	$search = $_GET['search'] ?? '';

	if (!empty($search)) {
		$stmt = $pdo->prepare("SELECT * FROM employees WHERE firstname LIKE ? OR lastname LIKE ? OR email LIKE ?");
		$searchTerm = "%$search%";
		$stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
		$employees = $stmt->fetchAll();
	} else {
		$stmt = $pdo->query("SELECT * FROM employees");
		$employees = $stmt->fetchAll();
	}

	$title = "Current Employees";
	require_once "includes/header.php";
?>
<main>
	<h1>Current Employees</h1>

	<form action="employeeList.php" method="GET">
		<div>
			<label for="search">Search Employees:</label>
			<input type="text" id="search" name="search" placeholder="Search by name or email" value="<?php echo htmlspecialchars($search); ?>">
		</div>
		<div>
			<button type="submit">Search</button>
		</div>
	</form>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Dept ID</th>
				<th>Hire Date</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($employees)): ?>
				<?php foreach ($employees as $emp): ?>
					<tr>
						<td><?php echo htmlspecialchars($emp['employee_id']); ?></td>
						<td><?php echo htmlspecialchars($emp['firstname']); ?></td>
						<td><?php echo htmlspecialchars($emp['lastname']); ?></td>
						<td><?php echo htmlspecialchars($emp['email']); ?></td>
						<td><?php echo htmlspecialchars($emp['phone']); ?></td>
						<td><?php echo htmlspecialchars($emp['dept_id'] ?? '-'); ?></td>
						<td><?php echo htmlspecialchars($emp['employment_date']); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="7">No employees found.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</main>
<?php require_once "includes/footer.php"; ?>