<?php
	require_once "config/db.php";

	$search = $_GET['search'] ?? '';

	if (!empty($search)) {
		$stmt = $pdo->prepare("SELECT * FROM departments WHERE department_name LIKE ?");
		$stmt->execute(["%$search%"]);
		$departments = $stmt->fetchAll();
	} else {
		$stmt = $pdo->query("SELECT * FROM departments");
		$departments = $stmt->fetchAll();
	}

	$title = "Current Departments";
	require_once "includes/header.php";
?>
<main>
	<h1>Current Departments</h1>

	<form action="deptList.php" method="GET">
		<div>
			<label for="search">Search Departments:</label>
			<input type="text" id="search" name="search" placeholder="Department name" value="<?php echo htmlspecialchars($search); ?>">
		</div>
		<div>
			<button type="submit">Search</button>
		</div>
	</form>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Department Name</th>
				<th>Created Date</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($departments)): ?>
				<?php foreach ($departments as $dept): ?>
					<tr>
						<td><?php echo htmlspecialchars($dept['department_id']); ?></td>
						<td><?php echo htmlspecialchars($dept['department_name']); ?></td>
						<td><?php echo htmlspecialchars($dept['creation_date']); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr>
					<td colspan="3">No departments found.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</main>
<?php require_once "includes/footer.php"; ?>