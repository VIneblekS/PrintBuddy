<?php 
	include 'saveFunctions/saveManageFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	checkIfConnected();

	// Form submit
	if (isset($_POST['save'])) {
		
		$printerName = $_POST['save'];
		
		// Add to database
		save($savedConnection, $printerName);

	} else {
		header('Location: ../index.php');
		exit;
	}

?>