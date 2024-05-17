<?php 
	function check_password(&$password, &$passwordErr) {
		if (empty($_POST['newPassword']) || trim($_POST['newPassword']) == '')
			$passwordErr = 'Acest câmp este obligatoriu.';
		else {
			$password = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			if (strlen($password) < 8 || strlen($password) > 32)
				$passwordErr = 'Parola trebuie să conțină între 8 și 32 de caractere.';
			elseif (!preg_match("/^[a-zA-z0-9._!]+$/", $password))
				$passwordErr = 'Parola poate conține doar litere, cifre și ! . sau _.';
			else
				$password = password_hash($password, PASSWORD_DEFAULT);
		}
	}

	function check_errors($error) {
		if (empty($error)) return 1;
		return 0;
	}

	function storeError($error) {
		echo json_encode($error);
	}

	function update_usersTable($connection, $password) {
		$username = $_SESSION['username'];
		$sql = "UPDATE users SET password = '$password' WHERE username = '$username'";
		mysqli_query($connection, $sql);
	}

	function change_password($connection, $password) {
		update_usersTable($connection, $password);
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
?>