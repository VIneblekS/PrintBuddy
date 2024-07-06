<?php 
	include 'faqFunctions/manageFAQFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is an admin
	checkIfAdmin();

	$faqId = '';

	// Form submit
	if (isset($_POST['deny'])) {

		$faqId = $_POST['deny'];
		
		// Delete from the database
		deny_faq($connection, $faqId);
	} else {
		header('Location: ../FAQ.php');
		exit;
	}
?>
