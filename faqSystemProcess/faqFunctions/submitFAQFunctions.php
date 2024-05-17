<?php 
	function check_question(&$question, &$questionErr) {
		if (empty($_POST['question']) || trim($_POST['question']) == '')
			$questionErr = 'Acest câmp este obligatoriu.';
		else {
			$question = trim($_POST['question']);
			$question = filter_var($question, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}
	}

	function check_answer(&$answer, &$answerErr) {
		if (empty($_POST['answer']) || trim($_POST['answer']) == '')
			$answerErr = 'Acest câmp este obligatoriu.';
		else {
			$answer = trim($_POST['answer']);
			$answer = filter_var($answer, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}
	}

	function check_errors($questionErr, $answerErr) {
		if (empty($questionErr) && empty($answerErr)) return 1;
		return 0;
	}

	function storeErrors($questionErr, $answerErr) {
		$errors = ["questionErr" => $questionErr, "answerErr" => $answerErr];
		echo json_encode($errors);
	}

	function toKey($text) {
		$token = strtok($text, " .-");
		$key = "";

		while ($token !== FALSE) {
			$key = $key.metaphone($token)." ";
			$token = strtok(" .-");
		}

		return $key;
	}

	function submit_faq($connection, $question, $answer) {
		$username = $_SESSION['username'];
		$firstName = $_SESSION['firstName'];
		$lastName = $_SESSION['lastName'];
		$request = ($_SESSION['admin']) ? false : true;
		$questionKey = toKey($question);
		$answerKey = toKey($answer);
		$sql = "INSERT INTO faq (question, answer, request, username, firstName, lastName, questionKey, answerKey) VALUES ('$question', '$answer', '$request', '$username', '$firstName', '$lastName', '$questionKey', '$answerKey')";
		mysqli_query($connection, $sql);
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			echo json_encode(0);
			exit;
		}
	}
?>