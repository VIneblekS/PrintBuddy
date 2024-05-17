<?php
	function check_firstName(&$firstName, &$firstNameErr) {
		if (empty($_POST['newFirstName']) || trim($_POST['newFirstName']) == '')
			$firstNameErr = 'Acest câmp nu poate fi gol.';
		else {
			$firstName = trim($_POST['newFirstName']); 
			$firstName = filter_var($firstName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			if (!preg_match("/^[a-zA-Z ]+$/", $firstName))
				$firstNameErr = 'Sunt permise doar litere și spații.'; 
			else if($firstName == $_SESSION['firstName'])
				$firstNameErr = 'Acest prenume este deja asociat contului tău.';
		}
	}

	function check_errors($error) {
		if (empty($error)) return 1;
		return 0;
	}

	function storeError($error) {
		echo json_encode($error);
	}

	function update_usersTable($connection, $firstName) {
		$username = $_SESSION['username'];
		$sql = "UPDATE users SET firstName = '$firstName' WHERE username = '$username'";
		mysqli_query($connection, $sql);
	}

	function update_manualsTable($connection, $firstName) {
		$username = $_SESSION['username'];
		$sql = "UPDATE manuals SET firstName = '$firstName' WHERE username = '$username'";
		mysqli_query($connection, $sql);	
	}

	function update_faqTable($connection, $firstName) {
		$username = $_SESSION['username'];
		$sql = "UPDATE faq SET firstName = '$firstName' WHERE username = '$username'";
		mysqli_query($connection, $sql);	
	}

	function change_firstName($connection, $firstName) {
		update_usersTable($connection, $firstName);
		update_manualsTable($connection, $firstName);
		update_faqTable($connection, $firstName);
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
?>