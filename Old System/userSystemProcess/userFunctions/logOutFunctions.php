<?php 
	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}

	function logOut($connection) {
		$previousId = session_id();
		$sql = "UPDATE users SET sessionId = null WHERE sessionId = '$previousId'";
		mysqli_query($connection, $sql);
		setcookie('connection', true, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);
		setcookie('sessionId', $previousId, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);		
		header('Location: ../index.php');
		exit;
	}
?>