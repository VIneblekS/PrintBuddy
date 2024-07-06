<?php 
	include 'userFunctions/deleteAccountFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is already connected
	checkIfConnected();

	$confirmation = '';
	$confirmationErr = '';

	// Form submit
	if (isset($_POST['delete'])) {
		
		// Search for errors
		check_confirmation($connection, $confirmation, $confirmationErr);

		// Validate
		if (check_errors($confirmationErr)) {
			// Delete user from database
			delete_user($connection, $ratingsConnection, $historyConnection, $savedConnection);
		} else {
			// Store the errors for the form
			storeError($confirmationErr);
		}
	} else {
		header('Location: ../settings.php');
		exit;
	}
?>