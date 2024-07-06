<?php
	function check_confirmation($connection, &$confirmation, &$confirmationErr) {
		if (empty($_POST['confirmation']) || trim($_POST['confirmation']) == '')
			$confirmationErr = 'Acest câmp nu poate fi gol.';
		else {
			$password = filter_input(INPUT_POST, 'confirmation', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$username = $_SESSION['username'];
			$sql = "SELECT * FROM users WHERE username = '$username'";
			$resultData = mysqli_query($connection, $sql);
			$resultData = mysqli_fetch_assoc($resultData);
			$hashedPassword = $resultData['password'];
			if (!password_verify($password, $hashedPassword))
				$confirmationErr = 'Parola este incorectă!';
		}
	}

	function check_errors($error) {
		if(empty($error)) return 1;
		return 0;
	}

	function storeError($error) {
		echo json_encode($error);
	}

	function check_rated($ratingsConnection, $manualId) {
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM rating".$manualId." WHERE username = '$username'";
		$resultData = mysqli_query($ratingsConnection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if ($resultData) return 1;
		return 0;
	}

	function update_numberOfratings($connection, $ratingsConnection, $manualId) {
		$sql = "SELECT * FROM manuals WHERE id = $manualId";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		$ratingsNumber = $resultData['ratings'];
		if (check_rated($ratingsConnection, $manualId))
			$ratingsNumber --;
		$sql = "UPDATE manuals SET ratings = $ratingsNumber WHERE id = $manualId";
		mysqli_query($connection, $sql);
		return $ratingsNumber;
	}

	function delete_rate($ratingsConnection, $manualId, $username) {
		$sql = "DELETE FROM rating".$manualId." WHERE username = '$username'";
		mysqli_query($ratingsConnection, $sql);
	}

	function updateAverage($connection, $ratingsConnection, $numberOfRatings, $manualId) {
		$sql = "SELECT * FROM rating".$manualId;
		$resultData = mysqli_query($ratingsConnection, $sql);
		$resultData = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
		$ratingSum = 0;
		$numberOfRatings = ($numberOfRatings == 0) ? 1 :  $numberOfRatings;
		foreach ($resultData as $result)
			$ratingSum += $result['rating'];
		$ratingAverage = 1.0 * $ratingSum / $numberOfRatings;
		$sql = "UPDATE manuals SET overallRating = $ratingAverage WHERE id = $manualId";
		mysqli_query($connection, $sql);
	}

	function delete_user($connection, $ratingsConnection, $historyConnection, $savedConnection) {
		$sql = "DROP TABLE ".$_SESSION['username'];
		mysqli_query($historyConnection, $sql);
		$sql = "DROP TABLE ".$_SESSION['username'];
		mysqli_query($savedConnection, $sql);
		$sql = "SELECT * FROM manuals";
		$resultManuals = mysqli_query($connection, $sql);
		$resultManuals = mysqli_fetch_all($resultManuals, MYSQLI_ASSOC);
		$username = $_SESSION['username'];
		foreach ($resultManuals as $manual) {
			$manualId = $manual['id'];
			$numberOfRatings = update_numberOfratings($connection, $ratingsConnection, $manualId); 
			delete_rate($ratingsConnection, $manualId, $username);
			updateAverage($connection, $ratingsConnection, $numberOfRatings, $manualId);
		}
		$sql = "DELETE FROM users WHERE username = '$username'";
		mysqli_query($connection, $sql);
		setcookie('connection', true, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);
		setcookie('sessionId', true, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);		
		echo json_encode(null);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
?>