<?php 
	include 'manualFunctions/submitManualFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php'; 

	// Check if the user is connected
	checkIfConnected();

	$printerName = $image = $description = $document = $video = '';
	$printerNameErr = $imageErr = $descriptionErr = $documentErr = $videoErr = '';

	// Form submit
	if (isset($_POST['manualAdd'])) {

		// Search for errors
		check_printerName($connection, $printerName, $printerNameErr);
		check_image($image, $imageErr);
		check_description($description, $descriptionErr);
		check_document($document, $documentErr);
		check_video($video, $videoErr);
		
		// Validate
		if (check_errors($printerNameErr, $imageErr, $descriptionErr, $documentErr, $videoErr)) {

			// Submit the manual to an admin
			submit_manual($connection, $ratingsConnection, $printerName, $image, $description, $document, $video);
		} else {

			// Store the errors for the form
			storeErrors($printerNameErr, $imageErr, $descriptionErr, $documentErr, $videoErr);
		}
	} else {
		header('Location: ../manuals.php');
		exit;
	}
?>