<?php
	require_once "config/db.php";

	$totalEmployees = 0;
	$totalDepartments = 0;

	try {
		$totalEmployees = (int)$pdo->query("SELECT COUNT(*) FROM employees")->fetchColumn();
		$totalDepartments = (int)$pdo->query("SELECT COUNT(*) FROM departments")->fetchColumn();
	} catch (\PDOException $e) {
		error_log($e->getMessage());
	}

	$title = "Dashboard";
	require_once "includes/header.php";
?>
<main>
	<h1>Dashboard</h1>

	<div style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
		<div style="flex: 1; background: #e0f2fe; padding: 1rem; border-radius: 6px; text-align: center;">
			<div style="font-size: 1.75rem; font-weight: bold; color: #0369a1;"><?php echo $totalEmployees; ?></div>
			<div style="color: #0c4a6e; font-size: 0.9rem;">Total Employees</div>
		</div>
		<div style="flex: 1; background: #fef3c7; padding: 1rem; border-radius: 6px; text-align: center;">
			<div style="font-size: 1.75rem; font-weight: bold; color: #b45309;"><?php echo $totalDepartments; ?></div>
			<div style="color: #78350f; font-size: 0.9rem;">Total Departments</div>
		</div>
	</div>

	<form action="employeeList.php" method="GET" style="margin-bottom: 1.5rem;">
		<div>
			<label for="search">Quick Search Employees:</label>
			<input type="text" id="search" name="search" placeholder="Search by name, email, or department...">
		</div>
		<div>
			<button type="submit">Search</button>
		</div>
	</form>

	<section>
		<h2>Quick Links</h2>
		<ul>
			<li><a href="employeeList.php">List Current Employees</a></li>
			<li><a href="addEmployee.php">Add New Employee</a></li>
			<li><a href="editEmployee.php">Modify Employee Data</a></li>
			<li><a href="removeEmployee.php">Remove An Employee</a></li>
			<li><a href="deptList.php">Current Departments</a></li>
			<li><a href="addDept.php">Add New Department</a></li>
			<li><a href="removeDept.php">Remove Department</a></li>
		</ul>
	</section>
</main>
<?php require_once "includes/footer.php"; ?>