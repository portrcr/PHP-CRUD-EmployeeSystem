<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title ?? "Employee Management System"; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<header>
		<nav>
			<a href="index.php">Dashboard</a>
			<a href="deptList.php">Current Departments</a>
			<a href="addDept.php">Add New Department</a>
			<a href="employeeList.php">List Of Current Employees</a>
			<a href="addEmployee.php">Add New Employee</a>
			<a href="editEmployee.php">Modify Employee Data</a>
			<a href="removeEmployee.php">Remove An Employee</a>
		</nav>
	</header>