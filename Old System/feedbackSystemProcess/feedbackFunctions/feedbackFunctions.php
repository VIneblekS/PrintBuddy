<?php 
	function checkIfConnected() {
		if(!isset($_COOKIE['connection'])) {
			echo json_encode(0);
			exit;
		}
	}

	function check_feedback(&$feedback, &$feedbackErr) {
		if(empty($_POST['feedback']) || trim($_POST['feedback']) == '') 
			$feedbackErr = 'Acest câmp este obligatoriu.';
		else
			$feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}

	function check_errors($error) {
		if(empty($error)) return 1;
		return 0;
	}

	function storeErrors($feedbackErr) {
		echo json_encode($feedbackErr);
	}

	function checkIfAlreadyReviewed($connection, $username) {
		$sql = "SELECT * FROM reviews WHERE username = '$username'";
		$isRated = mysqli_query($connection, $sql);
		$isRated = mysqli_fetch_assoc($isRated);
		
		if ($isRated) {
			$sql = "DELETE FROM reviews WHERE username ='$username'";
			mysqli_query($connection, $sql);
		}
	}

	function addFeedback($connection, $feedback) {
		$username = $_SESSION['username'];
		$firstName = $_SESSION['firstName'];
		$lastName = $_SESSION['lastName'];
		checkIfAlreadyReviewed($connection, $username);
		$sql = "INSERT INTO reviews (username, firstName, lastName, review) VALUES ('$username', '$firstName', '$lastName', '$feedback')";
		mysqli_query($connection, $sql);
		echo json_encode(null);
	}
?>