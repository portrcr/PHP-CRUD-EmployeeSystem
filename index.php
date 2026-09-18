<?php
	require_once "config/db.php";

	$title = "Dashboard";
	require_once "includes/header.php";
?>
	<main>
		<h1>Dashboard</h1>

		<form action="employeeList.php" method="GET">
			<div>
				<label for="search">Quick Search Employees:</label>
				<input type="text" id="search" name="search" placeholder="Search by name or email">
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
<?php	require_once "includes/footer.php";	?>