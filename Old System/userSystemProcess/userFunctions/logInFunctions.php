<?php 
	function check_userOrEmail(&$user, &$userErr) {
		if (empty($_POST['user']) || trim($_POST['user']) == '')
			$userErr = 'Acest câmp este obligatoriu.';
		else 
			$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}

	function check_password(&$password, &$passwordErr) {
		if (empty($_POST['password']) || trim($_POST['password']) == '')
			$passwordErr = 'Acest câmp este obligatoriu.';
		else 
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}

	function check_userExists($connection, $username) {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if ($resultData) return $resultData;
		return 0;
	}

	function check_emailExists($connection, $email) {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if ($resultData) return $resultData;
		return 0;
	}

	function check_credentials($connection, $user, $password) {
		$credentials = check_userExists($connection, $user) ? check_userExists($connection, $user) : check_emailExists($connection, $user);
		$hashedPassword = $credentials['password'];
		if (password_verify($password, $hashedPassword)) return 1;
		return 0;
	}

	function check_errors($connection, $user, $password, &$userErr, &$passwordErr) {
		if (!empty($userErr) || !empty($passwordErr)) return 0;
		if ((!check_userExists($connection, $user) && !check_emailExists($connection, $user)) || !check_credentials($connection, $user, $password)) {
			$passwordErr = "Date de conectare invalide.";
			return 0;
		}  
		return 1;
	}

	function storeErrors($userErr, $passwordErr) {
		$errorArr = ["userErr" => $userErr, "passwordErr" => $passwordErr];
		echo json_encode($errorArr);
	}

	function logIn($connection, $user, $duration) {
		session_start();
		$sessionId = session_id();
		$sql = "UPDATE users SET sessionId = '$sessionId' WHERE email = '$user' OR username = '$user'";
		mysqli_query($connection, $sql);
		$endTime = ($duration == null) ? 1 : $duration;
		setcookie('connection', $endTime, $duration, '/', $_SERVER['HTTP_HOST'], true, true);
		setcookie('sessionId', $sessionId, $duration, '/', $_SERVER['HTTP_HOST'], true, true);	
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
?>
