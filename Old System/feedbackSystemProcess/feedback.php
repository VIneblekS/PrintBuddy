<?php
	include 'feedbackFunctions/feedbackFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	
	// Check if the user is connected
	checkIfConnected();

	$feedback = '';
	$feedbackErr = '';

	// Form submit
	if (isset($_POST['addFeedback'])) {

		
		// Search for errors
		check_feedback($feedback, $feedbackErr);
	
		// Validate
		if (check_errors($feedbackErr)) {
			// Log the user in
			addFeedback($connection, $feedback);
		} else {

			// Store the errors for the form and the credentials
			storeErrors($feedbackErr);
		}
	} else {
		header('Location: ../index.php');
		exit;
	}
?>