<?php
	$host		= "localhost";
	$dbname		= "u473058213_employee_db";
	$user		= "u473058213_root";
	$pass		= "M;bc*m;%9K3%P)v";
	$charset	= "utf8mb4";

	$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

	$options = [
		PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION,	// Throw exceptions on errors
		PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC,		// Return data as associative arrays
		PDO::ATTR_EMULATE_PREPARES		=> false,					// Use real prepared statements
	];

	try {
		$pdo = new PDO($dsn, $user, $pass, $options);
	} catch (\PDOException $e) {
		error_log($e->getMessage());
		die("Database connection failed");
	}
	