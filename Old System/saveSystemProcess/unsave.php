<?php 
	include 'saveFunctions/saveManageFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	checkIfConnected();

	// Form submit
	if (isset($_POST['unsave'])) {
		
		$printerName = $_POST['unsave'];
		
		// Add to database
		unsave($savedConnection, $printerName);

	} else {
		header('Location: ../index.php');
		exit;
	}

?>