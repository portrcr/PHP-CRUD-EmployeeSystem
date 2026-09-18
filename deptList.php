<?php
	require_once "config/db.php";

	$title = "Current Departments";
	require_once "includes/header.php";
?>
<main>
	<h1>Current Departments</h1>
	<form action="deptList.php" method="GET">
		<div>
			<label for="search">Search Departments:</label>
			<input type="text" id="search" name="search" placeholder="Department name or ID">
		</div>
		<div>
			<button type="submit">Search</button>
		</div>
	</form>
</main>
<?php	require_once "includes/footer.php";	?>