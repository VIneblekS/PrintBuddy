<?php 
	include 'chatFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/InfoEdProject/session/session.php';

	$message = '';
	$messageErr = $loginErr = '';

	if (isset($_POST['send'])) {

		// Search for errors
		check_login($loginErr);
		check_message($message, $messageErr);

		// Validate
		if (check_errors($loginErr, $messageErr)) {
			// Send mesage
			send_message($connection, $message);
		}
	}
?>