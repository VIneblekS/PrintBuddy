<?php

	// Define database constants
	define('HISTORY_DB_HOST', 'localhost');
	define('HISTORY_DB_USER', 'printbuddy_Stefan');
	define('HISTORY_DB_PASWORD', 'Stefan24.09.2007');
	define('HISTORY_DB_NAME', 'printbuddy_searchhistory');

	// Create connection	
	$historyConnection = new mysqli(HISTORY_DB_HOST, HISTORY_DB_USER, HISTORY_DB_PASWORD, HISTORY_DB_NAME);

	// Check connection
	if ($historyConnection->connect_error) {
		die('Connection Failed ' . $historyConnection->connect_error);	
	}
?>
