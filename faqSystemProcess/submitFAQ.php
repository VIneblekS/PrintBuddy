<?php 
	include 'faqFunctions/submitFAQFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is connected
	checkIfConnected();

	$question = $answer = '';
	$questionErr = $answerErr = '';

	// Form submit
	if (isset($_POST['faqAdd'])) {

		// Search for errors
		check_question($question, $questionErr);
		check_answer($answer, $answerErr);
		
		// Validate
		if (check_errors($questionErr, $answerErr)) {
			// Submit the faq to an admin
			submit_faq($connection, $question, $answer);
		} else {
			// Store the errors for the form
			storeErrors($questionErr, $answerErr);
		}
	} else {
		header('Location: ../FAQ.php');
		exit;
	}
?>