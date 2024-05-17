<?php 
	include 'faqFunctions/manageFAQFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	checkIfAdmin();

	$faqId = '';

	// Form submit
	if (isset($_POST['approve'])) {
		$faqId = $_POST['approve'];
		approve_faq($connection, $faqId);
	} else {
		header('../FAQ.php');
		exit;
	}
?>
