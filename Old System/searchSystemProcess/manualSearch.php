<?php 
	include 'searchFunctions/manualSearchFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$userSearch = '';

	// Form submit
	if (isset($_POST['search'])) {
		// Search for errors
		check_search($userSearch);

		// Get the results
		search($connection, $historyConnection, $userSearch);
		
	} else {
		header('../manuals.php');
		exit;
	}

?>