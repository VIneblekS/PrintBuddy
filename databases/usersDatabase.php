<?php

	// Define database constants
	define('DB_HOST', 'localhost');
	define('DB_USER', 'printbuddy_Stefan');
	define('DB_PASWORD', 'Stefan24.09.2007');
	define('DB_NAME', 'printbuddy_infoed_db');

	// Create connection	
	$connection = new mysqli(DB_HOST, DB_USER, DB_PASWORD, DB_NAME);

	// Check connection
	if ($connection->connect_error) {
		die('Connection Failed ' . $connection->connect_error);	
	}
?>
