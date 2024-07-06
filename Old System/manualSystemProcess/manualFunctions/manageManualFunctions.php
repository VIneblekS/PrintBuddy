<?php 	
	function create_ratingDatabase($connection, $ratingsConnection, $manualId) {
		$sql = "SELECT * FROM manuals WHERE id = '$manualId'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		$resultData['printerName'] = str_replace(' ', '', $resultData['printerName']);
		$sql = "CREATE TABLE ".$resultData['printerName']." (username VARCHAR(256) PRIMARY KEY NOT NULL, rating INT(11) NOT NULL)";
		mysqli_query($ratingsConnection, $sql);
	}

	function delete_ratingDatabase($ratingsConnection, $manualId) {
		$sql = "DROP TABLE rating".$manualId;
		mysqli_query($ratingsConnection, $sql);
	}

	function delete_files($connection, $manualId) {
		$sql = "SELECT * FROM manuals WHERE id = '$manualId'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		$printerName = $resultData['printerName'];
		$printerNameConc = str_replace(' ', '', $printerName);
		$printerNameConc = str_replace('.', '_', $printerNameConc);
		$storingDirectory = $_SERVER['DOCUMENT_ROOT'].'/manuals/'.$printerNameConc;
		unlink($storingDirectory.'/'.$printerNameConc.'Manual');
		unlink($storingDirectory.'/'.$printerNameConc.'Photo');
		rmdir($storingDirectory);
		unlink($_SERVER['DOCUMENT_ROOT'].'/manuals/'.$printerNameConc.'.php');
	}

	function delete_manual($connection, $ratingsConnection, $manualId) {
		delete_files($connection, $manualId);
		delete_ratingDatabase($ratingsConnection, $manualId);
		$sql = "DELETE FROM manuals WHERE id = '$manualId'";
		mysqli_query($connection, $sql);
		header('Location: ../manuals.php');
		exit;
	}

	function deny_manual($connection, $ratingsConnection, $manualId) {
		delete_files($connection, $manualId);
		delete_ratingDatabase($ratingsConnection, $manualId);
		$sql = "DELETE FROM manuals WHERE id = '$manualId'";
		mysqli_query($connection, $sql);
		header('Location: ../adminPanel.php');
		exit;
	}


	function approve_manual($connection, $ratingsConnection, $manualId) {
		$sql = "UPDATE manuals SET request = false WHERE id = '$manualId'";
		mysqli_query($connection, $sql);
		header('Location: ../adminPanel.php');
		exit;
	}

	function checkIfAdmin() {
		if (!isset($_COOKIE['connection']) || $_SESSION['admin'] == 0) {
			header('Location: ../manuals.php');
			exit;
		}
	}
?>