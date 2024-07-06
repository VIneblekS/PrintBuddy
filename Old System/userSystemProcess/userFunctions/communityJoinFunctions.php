<?php 
	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../logIn.php');
			exit;
		}
	}

	function joinCommunity($connection) {
		$username = $_SESSION['username'];
		$sql = "UPDATE users SET community = 1 WHERE username = '$username'";
		mysqli_query($connection, $sql);
		header('Location: ../community.php');
		exit;
	}
?>