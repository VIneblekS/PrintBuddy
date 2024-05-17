<?php 
	include 'manualFunctions/manageManualFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is an admin
	checkIfAdmin();

	$manualId = '';

	// Form submit
	if (isset($_POST['delete'])) {

		// Get the manual id
		$manualId = $_POST['delete'];

		// Delete the manual
		delete_manual($connection, $ratingsConnection, $manualId);
	} else {
		header('Location: ../manuals.php');
		exit;
	}
?>
