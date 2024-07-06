<?php 
	include 'userFunctions/communityJoinFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	checkIfConnected();

	joinCommunity($connection);

?>