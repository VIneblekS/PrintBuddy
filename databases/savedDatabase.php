<?php

	// Define database constants
	define('SAVED_DB_HOST', 'localhost');
	define('SAVED_DB_USER', 'printbuddy_Stefan');
	define('SAVED_DB_PASWORD', 'Stefan24.09.2007');
	define('SAVED_DB_NAME', 'printbuddy_saved');

	// Create connection	
	$savedConnection = new mysqli(SAVED_DB_HOST, SAVED_DB_USER, SAVED_DB_PASWORD, SAVED_DB_NAME);

	// Check connection
	if ($connection->connect_error) {
		die('Connection Failed ' . $connection->connect_error);	
	}
?>
