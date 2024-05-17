<?php 
	include 'searchFunctions/faqSearchFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$userSearch = '';

	// Form submit
	if (isset($_POST['search'])) {
		// Search for errors
		check_search($userSearch);

		// Get the results
		search($connection, $userSearch);

	} else {
		header('Location: ../FAQ.php');
		exit;
	}

?>