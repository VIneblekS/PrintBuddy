<?php 
	include 'userFunctions/changeFirstNameFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is already connected
	checkIfConnected();

	$firstName = '';
	$firstNameErr = '';

	// Form submit
	if (isset($_POST['change'])) {

		// Search for errors
		check_firstName($firstName, $firstNameErr);
		
		// Validate
		if (check_errors($firstNameErr)) {
			// Change the first name
			change_firstName($connection, $firstName);
		} else {
			// Store the errors for the form
			storeError($firstNameErr);
		}
	} else {
		header('Location: ../settings.php');
		exit;
	}
?>