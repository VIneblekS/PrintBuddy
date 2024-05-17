<?php 
	include 'sessionFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/databases/usersDatabase.php';
	include $_SERVER['DOCUMENT_ROOT'].'/databases/historyDatabase.php';
	include $_SERVER['DOCUMENT_ROOT'].'/databases/ratingDatabase.php'; 
	include $_SERVER['DOCUMENT_ROOT'].'/databases/savedDatabase.php'; 

	date_default_timezone_set("Europe/Bucharest");

	$frequency = 10*60; // 10 minutes

	if (isSessionActive($connection) == 2) {
		regenerateSessionId($connection, $frequency);
		getSessionData($connection);
	} elseif (isSessionActive($connection) == 1) {
	    setcookie('connection', true, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);
	    setcookie('sessionId', $previousId, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);	
	    header("Refresh:0");
	} else
		stopSession($connection);
?>