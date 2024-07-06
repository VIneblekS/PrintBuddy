<?php 
	include 'manualFunctions/manageManualFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	checkIfAdmin();

	$manualId = '';

	// Form submit
	if (isset($_POST['approve'])) {

		// Get the manual id
		$manualId = $_POST['approve'];

		// Approve the manual
		approve_manual($connection, $ratingsConnection, $manualId);
	} else {
		header('Location: ../manuals.php');
		exit;
	}
?>
