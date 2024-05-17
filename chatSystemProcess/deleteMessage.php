<?php 
	include 'chatFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$messageId = '';

	if (isset($_POST['delete'])) {

		// Get message id
		$messageId = $_POST['delete'];

		// Delete message
		delete_message($connection, $messageId);
	}
?>