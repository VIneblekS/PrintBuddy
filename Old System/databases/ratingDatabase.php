<?php

	// Define database constants
	define('RATING_DB_HOST', 'localhost');
	define('RATING_DB_USER', 'printbuddy_Stefan');
	define('RATING_DB_PASWORD', 'Stefan24.09.2007');
	define('RATING_DB_NAME', 'printbuddy_ratings');

	// Create connection	
	$ratingsConnection = new mysqli(RATING_DB_HOST, RATING_DB_USER, RATING_DB_PASWORD, RATING_DB_NAME);

	// Check connection
	if ($ratingsConnection->connect_error) {
		die('Connection Failed ' . $ratingsConnection->connect_error);	
	}
?>
