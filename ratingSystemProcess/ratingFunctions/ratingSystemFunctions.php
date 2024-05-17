<?php 

	function check_ratedAlready($ratingsConnection, $manualId) {
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
		if (!check_ratedAlready($ratingsConnection, $manualId))
			$ratingsNumber ++;
		$sql = "UPDATE manuals SET ratings = $ratingsNumber WHERE id = $manualId";
		mysqli_query($connection, $sql);
		return $ratingsNumber;
	}

	function addRating($connection, $ratingsConnection, $rate, $manualId) {
		$username = $_SESSION['username'];
		if (!check_ratedAlready($ratingsConnection, $manualId))
			$sql = "INSERT INTO rating".$manualId." (username, rating) VALUES ('$username', '$rate')";
		else
			$sql = "UPDATE rating".$manualId." SET rating = $rate WHERE username = '$username'";
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

	function getPrinterName($connection, $manualId) {
		$sql = "SELECT * FROM manuals WHERE id ='$manualId'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		return $resultData['printerName'];
	}

	function rate($connection, $ratingsConnection, $manualId, $rate) {
		$printerNameConc = str_replace(' ', '', getPrinterName($connection, $manualId));
		$printerNameConc = str_replace('.', '_', $printerNameConc);
		$numberOfRatings = update_numberOfratings($connection, $ratingsConnection, $manualId);
		addRating($connection, $ratingsConnection, $rate, $manualId);
		updateAverage($connection, $ratingsConnection, $numberOfRatings, $manualId);
		header('Location: ../manuals/'.$printerNameConc.'.php');
		exit;
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../logIn.php');
			exit;
		}
	}
?>