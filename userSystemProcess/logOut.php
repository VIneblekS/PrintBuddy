<?php
	include 'userFunctions/logOutFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	checkIfConnected();
	
	// Log out the user
	logOut($connection);
?>