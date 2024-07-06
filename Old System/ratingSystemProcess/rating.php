<?php 
	include 'ratingFunctions/ratingSystemFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$rate = null;
	$manualId = '';

	// Form submit
	if (isset($_POST['rate'])) {

		// Get manual id
		$manualId = $_POST['rate'];

		// Get the rating
		$rate = $_POST['rating'];

		checkIfConnected();

		// Add rating
		rate($connection, $ratingsConnection, $manualId, $rate);
	} else {
		header('Location: ../index.php');
		exit;
	}

?>