<?php 
	function check_userExists($connection, $username) {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if ($resultData) return 1;
		return 0;
	}

	function check_username($connection, &$username, &$usernameErr) {
		if (empty($_POST['username']) || trim($_POST['username']) == '')
			$usernameErr = 'Acest câmp este obligatoriu.';
		else {
			$username = trim($_POST['username']); 
			$username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			if (!preg_match("/^[a-zA-Z0-9_]+$/", $username))
				$usernameErr = 'Sunt permise doar litere fără diacritice, cifre și _.'; 	
			elseif (check_userExists($connection, $username))
				$usernameErr = 'Acest nume de utilizator este folosit.';	
		}
		
	}

	function check_firstName(&$firstName, &$firstNameErr) {
		if (empty($_POST['firstName']) || trim($_POST['firstName']) == '')
			$firstNameErr = 'Acest câmp este obligatoriu.';
		else {
			$firstName = trim($_POST['firstName']); 
			$firstName = filter_var($firstName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			if (!preg_match("/^[a-zA-Z ]+$/", $firstName))
				$firstNameErr = 'Sunt permise doar litere, fără diacritice.'; 
		}
	}

	function check_lastName(&$lastName, &$lastNameErr){
			if (empty($_POST['lastName']) || trim($_POST['lastName']) == '')
			$lastNameErr = 'Acest câmp este obligatoriu.';
		else {
			$lastName = trim($_POST['lastName']); 
			$lastName = filter_var($lastName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			if (!preg_match("/^[a-zA-Z ]+$/", $lastName))
				$lastNameErr = 'Sunt permise doar litere, fără diacritice.';
		}
	}

	function check_emailExists($connection, $email) {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if ($resultData) return 1;
		return 0;
	}

	function check_email($connection, &$email, &$emailErr) {
		if (empty($_POST['email']) || trim($_POST['email']) == '')
			$emailErr = 'Acest câmp este obligatoriu.';
		else {
			$email = trim($_POST['email']);
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			list($user, $domain) = (strpos($email, '@')) ? explode('@', $email) : null;
			if (empty($domain) || !checkdnsrr($domain) || !preg_match("/^[a-zA-Z0-9.]+$/", $user))
				$emailErr = 'Acest email este invalid.';
			elseif (check_emailExists($connection, $email))
				$emailErr = 'Acest email este folosit.'; 
		}
	}

	function check_password(&$password, &$passwordErr, &$passwordConfirm, &$passwordConfirmErr, &$passwordMatchErr) {
		if (empty($_POST['password']) || trim($_POST['password']) == '')
			$passwordErr = 'Acest câmp este obligatoriu.';
		else {
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			if (strlen($password) < 8 || strlen($password) > 32)
				$passwordErr = 'Parola trebuie să conțină între 8 și 32 de caractere.';
			elseif (!preg_match("/^[a-zA-z0-9._!]+$/", $password))
				$passwordErr = 'Parola poate conține doar litere, cifre și ! . sau _.';
		}
	
		if (empty($_POST['passwordConfirm']) || trim($_POST['passwordConfirm']) == '')				
			$passwordConfirmErr = 'Acest câmp este obligatoriu.';
		else 
			$passwordConfirm = filter_input(INPUT_POST, 'passwordConfirm', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		if ($password != $passwordConfirm && empty($passwordErr) && empty($passwordConfirmErr))
			$passwordMatchErr = 'Parolele nu se potrivesc.';
		else
			$password = password_hash($password, PASSWORD_DEFAULT);
		
	}

	function check_errors($usernameErr, $firstNameErr, $lastNameErr, $emailErr, $passwordErr, $passwordConfirmErr, $passwordMatchErr) {
		if (empty($usernameErr) && empty($firstNameErr) && empty($lastNameErr) && empty($emailErr) && empty($passwordErr) && empty($passwordConfirmErr) && empty($passwordMatchErr)) return 1;
		return 0;
	}	

	function createUserSearchHistory($historyConnection, $username) {
		$sql = "CREATE TABLE ".$username." (id INT(11) PRIMARY KEY AUTO_INCREMENT, search TEXT(7000) NOT NULL, searchTime DATETIME(6) NOT NULL)";
		mysqli_query($historyConnection, $sql);
	}

	function createUserSaved($savedConnection, $username) {
		$sql = "CREATE TABLE ".$username." (id INT(11) PRIMARY KEY AUTO_INCREMENT, printerName TEXT(256) NOT NULL)";
		mysqli_query($savedConnection, $sql);
	}

	function storeErrors($usernameErr, $firstNameErr, $lastNameErr, $emailErr, $passwordErr, $passwordConfirmErr, $passwordMatchErr) {
		if (!empty($passwordMatchErr))
			$passwordErr = $passwordConfirmErr = $passwordMatchErr;
		$errorArr = ["usernameErr" => $usernameErr, "firstNameErr" => $firstNameErr, "lastNameErr" => $lastNameErr, "emailErr" => $emailErr, "passwordErr" => $passwordErr, "passwordConfirmErr" => $passwordConfirmErr];
		echo json_encode($errorArr);
	}

	function signUp($connection, $historyConnection, $savedConnection, $username, $firstName, $lastName, $email, $password) {
		session_start();
		$sessionId = session_id();
		$sql = "INSERT INTO users (username, firstName, lastName, email, password, sessionId) VALUES ('$username', '$firstName', '$lastName', '$email', '$password', '$sessionId')";	
		mysqli_query($connection, $sql);
		createUserSearchHistory($historyConnection, $username);
		createUserSaved($savedConnection, $username);
		setcookie('connection', 1, null, '/', $_SERVER['HTTP_HOST'], true, true);
		setcookie('sessionId', $sessionId, null, '/', $_SERVER['HTTP_HOST'], true, true);	
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
 ?>