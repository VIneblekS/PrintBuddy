<?php

	// Define database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'printbuddy_Stefan');
	define('DB_PASWORD', 'Stefan24.09.2007');
	define('MAIN_DB_NAME', 'printbuddy_main_db');

	// Create connections	
	$conn['main'] = new mysqli(DB_HOST, DB_USER, DB_PASWORD, MAIN_DB_NAME);
	
	// Check connection
	if ($conn['main']->connect_error) {
		die('Connection Failed ' . $conn['main']->connect_error);	
	}
?>
