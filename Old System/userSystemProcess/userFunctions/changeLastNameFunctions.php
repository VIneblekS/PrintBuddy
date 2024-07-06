<?php  
	function check_lastName(&$lastName, &$lastNameErr) {
		if (empty($_POST['newLastName']) || trim($_POST['newLastName']) == '')
			$lastNameErr = 'Acest câmp nu poate fi gol.';
		else {
			$lastName = trim($_POST['newLastName']); 
			$lastName = filter_var($lastName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			if (!preg_match("/^[a-zA-Z ]+$/", $lastName))
				$lastNameErr = 'Sunt permise doar litere și spații.'; 
			else if ($lastName == $_SESSION['lastName'])
				$lastNameErr = 'Acest nume este deja asociat contului tău.';
		}
	}

	function check_errors($error) {
		if (empty($error)) return 1;
		return 0;
	}

	function storeError($error) {
		echo json_encode($error);
	}

	function update_usersTable($connection, $lastName) {
		$username = $_SESSION['username'];
		$sql = "UPDATE users SET lastName = '$lastName' WHERE username = '$username'";
		mysqli_query($connection, $sql);
	}

	function update_manualsTable($connection, $lastName) {
		$username = $_SESSION['username'];
		$sql = "UPDATE manuals SET lastName = '$lastName' WHERE username = '$username'";
		mysqli_query($connection, $sql);	
	}

	function update_faqTable($connection, $lastName) {
		$username = $_SESSION['username'];
		$sql = "UPDATE faq SET lastName = '$lastName' WHERE username = '$username'";
		mysqli_query($connection, $sql);	
	}

	function change_lastName($connection, $lastName) {
		update_usersTable($connection, $lastName);
		update_manualsTable($connection, $lastName);
		update_faqTable($connection, $lastName);
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
?>