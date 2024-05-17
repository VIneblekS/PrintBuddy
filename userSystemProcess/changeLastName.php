<?php 
	include 'userFunctions/changeLastNameFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is already connected
	checkIfConnected();

	$lastName = '';
	$lastNameErr = '';

	// Form submit
	if (isset($_POST['change'])) {

		// Search for errors
		check_lastName($lastName, $lastNameErr);
		
		// Validate
		if (check_errors($lastNameErr)) {
			// Change the first name
			change_lastName($connection, $lastName);
		} else {
			// Store the errors for the form
			storeError($lastNameErr);
		}
	} else {
		header('Location: ../settings.php');
		exit;
	}
?>