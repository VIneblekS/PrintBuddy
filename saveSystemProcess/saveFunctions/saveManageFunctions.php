<?php 
	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			echo json_encode(0);
			exit;
		}
	}

	function save($savedConnection, $printerName) {
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM ".$username." WHERE printerName = '$printerName'";
		$resultData = mysqli_query($savedConnection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if (!$resultData) {
			$sql = "INSERT INTO ".$username." (printerName) VALUES ('$printerName')";
			mysqli_query($savedConnection, $sql);
		}
		echo json_encode(null);
	}

	function unsave($savedConnection, $printerName) {
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM ".$username." WHERE printerName = '$printerName'";
		$resultData = mysqli_query($savedConnection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if ($resultData) {
			$sql = "DELETE FROM ".$username." WHERE printerName = '$printerName'";
			mysqli_query($savedConnection, $sql);
		}
		echo json_encode(null);
	}
?>