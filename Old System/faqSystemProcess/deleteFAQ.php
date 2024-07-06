<?php 
	include 'faqFunctions/manageFAQFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	// Check if the user is an admin
	checkIfAdmin();

	$faqId = '';

	// Form submit
	if (isset($_POST['delete'])) {

		$faqId = $_POST['delete'];
		
		// Delete from the database
		delete_faq($connection, $faqId);
	} else {
		header('Location: ../FAQ.php');
		exit;
	}
?>
