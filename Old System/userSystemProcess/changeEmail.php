<?php 
	include 'userFunctions/changeEmailFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is already connected
	checkIfConnected();

	$email = '';
	$emailErr = '';

	// Form submit
	if (isset($_POST['change'])) {

		// Search for errors
		check_email($connection, $email, $emailErr);
		
		// Validate
		if (check_errors($emailErr)) {
			// Change the first name
			change_email($connection, $email);
		} else {
			// Store the errors for the form
			storeError($emailErr);
		}
	} else {
		header('Location: ../settings.php');
		exit;
	}
?>