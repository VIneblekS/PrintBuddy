<?php 
	include 'userFunctions/changePasswordFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is already connected
	checkIfConnected();

	$password = '';
	$passwordErr = '';

	// Form submit
	if (isset($_POST['change'])) {

		// Search for errors
		check_password($password, $passwordErr);
		
		// Validate
		if (check_errors($passwordErr)) {
			// Change the first name
			change_password($connection, $password);
		} else {
			// Store the errors for the form
			storeError($passwordErr);
		}
	} else {
		header('Location: ../settings.php');
		exit;
	}
?>