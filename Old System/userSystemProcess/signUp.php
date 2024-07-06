<?php
	include 'userFunctions/signUpFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	
	// Check if the user is already connected
	checkIfConnected();

	$username = $firstName = $lastName = $email = $password = $passwordConfirm = '';
	$usernameErr = $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $passwordConfirmErr = $passwordMatchErr = '';
	
	// Form submit
	if (isset($_POST['signup'])) {
	
		// Search for errors
		check_username($connection, $username, $usernameErr);
		check_email($connection, $email, $emailErr);
		check_firstName($firstName, $firstNameErr);
		check_lastName($lastName, $lastNameErr);
		check_password($password, $passwordErr, $passwordConfirm, $passwordConfirmErr, $passwordMatchErr);

		// Validate the data
		if (check_errors($usernameErr, $firstNameErr, $lastNameErr, $emailErr, $passwordErr, $passwordConfirmErr, $passwordMatchErr)) {
			// Set the parameters for a new session
			setStartParams();

			// Add the user to the database
			signUp($connection, $historyConnection, $savedConnection, $username, $firstName, $lastName, $email, $password);
		}	else {

			// Store the errors for the form
			storeErrors($usernameErr, $firstNameErr, $lastNameErr, $emailErr, $passwordErr, $passwordConfirmErr, $passwordMatchErr);
		}
	} else {
		header('Location: ../index.php');
		exit;
	}
?>