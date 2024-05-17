<?php 
	include 'searchFunctions/manualSearchFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$searchId = null;

	checkIfConnected();

	// Form submit 
	if (isset($_POST['delete'])) {
		// Get search id
		$searchId = $_POST['delete'];
		
		// Delete search
		deleteSearch($historyConnection, $searchId);
	} else {
		header('Location: ../searchHistory.php');
		exit;
	}

?>