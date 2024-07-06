<?php
	function isSessionActive($connection) {
		if (isset($_COOKIE['connection'])) {
		    $previousId = $_COOKIE['sessionId'];
		    $sql = "SELECT * FROM users WHERE sessionId = '$previousId'";
		    $result = mysqli_query($connection, $sql);
		    $result = mysqli_fetch_assoc($result);
		    if ($result) return 2;
		    return 1;
		}
		return 0;
	}

	function setStartParams() {
		ini_set('session.use_only_cookies', 1);
		ini_set('session.use_strict_mode', 1);
	}

	function updateSessionId($connection, $previousId) {
		$currentId = session_id();
		$sql = "UPDATE users SET sessionId = '$currentId' WHERE sessionId ='$previousId'";
		mysqli_query($connection, $sql);
		$duration = ($_COOKIE['connection'] != 1) ? $_COOKIE['connection'] : null;
		setcookie('sessionId', $currentId, $duration, '/', $_SERVER['HTTP_HOST'], true, true);	
	}

	function updateLastOnline($connection) {
		$currentId = session_id();
		$date_time = date('Y-m-d H:i:s', time());
		$sql = "UPDATE users SET lastOnline = '$date_time' WHERE sessionId ='$currentId'";
		mysqli_query($connection, $sql);
	}

	function regenerateSessionId($connection, $time) {
		if (session_status() !== 2) {
			setStartParams();
			session_start();
			updateSessionId($connection, $_COOKIE['sessionId']);
		} elseif (!isset($_SESSION['lastRegeneration'])) {
			$previousId = session_id();
			session_regenerate_id(true);
			$_SESSION['lastRegeneration'] = time();
			updateSessionId($connection, $previousId);
		} elseif (time() - $_SESSION['lastRegeneration'] >= $time) {
			$previousId = session_id();
			session_regenerate_id(true);
			$_SESSION['lastRegeneration'] = time();
			updateSessionId($connection, $previousId);
		}
		updateLastOnline($connection);
	}

	function stopSession($connection) {
		if (session_status() === 2) {
			$previousId = session_id();
			session_unset();
			session_destroy();
			updateSessionId($connection, $previousId);
		}
	}

	function getSessionData($connection) {
		if(isset($_COOKIE['connection'])) {
			$currentId = session_id();
			$sql = "SELECT * FROM users WHERE sessionId = '$currentId'";
			$resultData = mysqli_query($connection, $sql);
			$resultData = mysqli_fetch_assoc($resultData);
			$_SESSION['username'] = $resultData['username'];
			$_SESSION['lastName'] = $resultData['lastName'];
			$_SESSION['firstName'] = $resultData['firstName'];
			$_SESSION['email'] = $resultData['email'];
			$_SESSION['admin'] = $resultData['admin'];
			$_SESSION['community'] = $resultData['community'];
		}
	}
?>