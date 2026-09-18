<?php
	require_once "config/db.php";

	$title = "Current Employees";
	require_once "includes/header.php";
?>
<main>
	<h1>Current Employees</h1>
	<form action="employeeList.php" method="GET">
		<div>
			<label for="search">Search Employees:</label>
			<input type="text" id="search" name="search" placeholder="Name, email, or department ID">
		</div>
		<div>
			<button type="submit">Search</button>
		</div>
	</form>
</main>
<?php	require_once "includes/footer.php";	?>