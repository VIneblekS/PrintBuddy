<?php
	function check_emailExists($connection, $email) {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if ($resultData) return 1;
		return 0;
	}

	function check_email($connection, &$email, &$emailErr) {
		if (empty($_POST['newEmail']) || trim($_POST['newEmail']) == '')
			$emailErr = 'Acest câmp nu poate fi gol.';
		else {
			$email = trim($_POST['newEmail']);
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			list($user, $domain) = (strpos($email, '@')) ? explode('@', $email) : null;
			if (empty($domain) || !checkdnsrr($domain) || !preg_match("/^[a-zA-Z0-9.]+$/", $user))
				$emailErr = 'Acest email este invalid.';
			elseif ($email == $_SESSION['email'])
				$emailErr = 'Acest email este deja asociat contului tau.';
			elseif (check_emailExists($connection, $email))
				$emailErr = 'Acest email este folosit.'; 
		}
	}

	function check_errors($error) {
		if (empty($error)) return 1;
		return 0;
	}

	function storeError($error) {
		echo json_encode($error);
	}

	function update_usersTable($connection, $email) {
		$username = $_SESSION['username'];
		$sql = "UPDATE users SET email = '$email' WHERE username = '$username'";
		mysqli_query($connection, $sql);
	}

	function change_email($connection, $email) {
		update_usersTable($connection, $email);
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
?>