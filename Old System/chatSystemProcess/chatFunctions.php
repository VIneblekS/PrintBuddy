<?php  
	function check_login(&$loginErr) {
		if (!isset($_COOKIE['connection'])) 
			$loginErr = 'User not connected'; 
	}

	function check_message(&$message, &$messageErr) {
		if (empty($_POST['message']) || trim($_POST['message']) == '')
			$messageErr = 'There should be a message';
		else {
			$message = trim($_POST['message']);
			$message = filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}
	}

	function check_errors($loginErr, $messageErr) {
		if (empty($loginErr) && empty($messageErr)) return 1;
		return 0;
	}

	function send_message($connection, $message) {
		$username = $_SESSION['username'];
		$date_time = date('Y-m-d H:i:s', time());
		$sql = "INSERT INTO chat (message, senderUsername, messageTime) VALUES ('$message', '$username', '$date_time')";
		mysqli_query($connection, $sql);
		header('Location: ../chat.php');
		exit;
	}

	function delete_message($connection, $messageId) {
		$sql = "DELETE FROM chat WHERE id = $messageId";
		mysqli_query($connection, $sql);
		header('Location: ../chat.php');
		exit;
	}
?>