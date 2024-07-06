<?php
	include 'userFunctions/logInFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	
	// Check if the user is already connected
	checkIfConnected();

	$duration = null;
	$user = $password = '';
	$userErr = $passwordErr = '';

	// Form submit
	if (isset($_POST['login'])) {

		if (!empty($_POST['keepConnection']))
			$duration = time() + 60*60*24*7;

		
		// Search for errors
		check_userOrEmail($user, $userErr);
		check_password($password, $passwordErr);

	
		// Validate
		if (check_errors($connection, $user, $password, $userErr, $passwordErr)) {
				// Set the parameters for a new session 
				setStartParams();
				
				// Log the user in
				logIn($connection, $user, $duration);
		} else {

			// Store the errors for the form and the credentials
			storeErrors($userErr, $passwordErr);
		}
	} else {
		header('Location: ../index.php');
		exit;
	}
?>