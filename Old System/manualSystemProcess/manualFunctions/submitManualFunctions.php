<?php
	function check_printerName($connection, &$printerName, &$printerNameErr) {
		if (empty($_POST['printerName']) || trim($_POST['printerName']) == '')
			$printerNameErr = 'Acest câmp este obligatoriu.';
		else {
			$printerName = trim($_POST['printerName']);
			$printerName = filter_var($printerName, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$sql = "SELECT * FROM manuals WHERE printerName = '$printerName'";
			$resultData = mysqli_query($connection, $sql);
			$resultData = mysqli_fetch_assoc($resultData);
			if ($resultData)
				$printerNameErr = 'Acest manual există deja.';
			elseif (!preg_match("/^[a-zA-z0-9 -._]+$/", $printerName))
				$printerNameErr = 'Numele manualului poate conține doar litere, cifre, spații - . și _.';
		}
	}

	function check_image(&$image, &$imageErr) {
		if (!isset($_FILES['image']) || $_FILES['image']['error'] == 4)
			$imageErr = 'Acest câmp este obligatoriu.';
		else {
			$image = filter_input(INPUT_POST, $_FILES['image']['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$fileName = $_FILES['image']['name'];
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
			if ($extension !== 'png' && $extension !== 'jpg')
				$imageErr = 'Imaginea trebuie să fie în format png sau jpg.';
		}
	}

	function check_description(&$description, &$descriptionErr) {
		if (empty($_POST['description']) || trim($_POST['description']) == '')
			$descriptionErr = 'Acest câmp este obligatoriu.';
		else {
			$description = trim($_POST['description']);
			$description = filter_var($description, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		}
	}

	function check_document(&$document, &$documentErr) {
		if (!isset($_FILES['document']) || $_FILES['document']['error'] == 4)
			$documentErr = 'Acest câmp este obligatoriu.';
		else {
			$document = filter_input(INPUT_POST, $_FILES['document']['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$fileName = $_FILES['document']['name'];
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
			if ($extension !== 'pdf')
				$documentErr = 'Manualul trebuie să fie în format pdf.';
		}
	}

	function check_video(&$video, &$videoErr) {
		if (empty($_POST['video']) || trim($_POST['video']) == '')
			$videoErr = 'Acest câmp este obligatoriu.';
		else {
			$video = trim($_POST['video']);
			$video = filter_var($video, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			if(strpos($video, "youtube.com") == FALSE || strpos($video, "/watch?v=") == FALSE)
				$videoErr = 'Linkul trebuie sa ducă la un videocpil de pe youtube.';
		}
	}

	function check_errors($printerNameErr, $imageErr, $descriptionErr, $documentErr, $videoErr) {
		if (empty($printerNameErr) && empty($imageErr) && empty($descriptionErr) && empty($documentErr) && empty($videoErr)) return 1;
		return 0;	
	}

	function storeErrors($printerNameErr, $imageErr, $descriptionErr, $documentErr, $videoErr) {
		$errors = ["printerNameErr" => $printerNameErr, "imageErr" => $imageErr, "descriptionErr" => $descriptionErr, "documentErr" => $documentErr, "videoErr" => $videoErr];
		echo json_encode($errors);
	}

	function create_ratingDatabase($ratingsConnection, $manualId) {
		$sql = "CREATE TABLE rating".$manualId." (id INT(11) PRIMARY KEY AUTO_INCREMENT, username VARCHAR(256) NOT NULL, rating INT(11) NOT NULL)";
		mysqli_query($ratingsConnection, $sql);
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

	function submit_manual($connection, $ratingsConnection, $printerName, $iamge, $description, $document, $video) {
		$printerNameConc = str_replace(' ', '', $printerName);
		$printerNameConc = str_replace('.', '_', $printerNameConc);

		$username = $_SESSION['username'];
		$firstName = $_SESSION['firstName'];
		$lastName = $_SESSION['lastName'];
		$request = true;
		if ($_SESSION['admin']) {
			$request = false;
		}
		$printerNameKey = toKey($printerName);
		$descriptionKey = toKey($description);

		mkdir($_SERVER['DOCUMENT_ROOT'].'/manuals/'.$printerNameConc);
		$storingDirectory = $_SERVER['DOCUMENT_ROOT'].'/manuals/'.$printerNameConc;

		$_FILES['image']['name'] = str_replace(' ', '', $printerNameConc).'Photo';
		$imageName = $_FILES['image']['name'];
		$imgTmpName = $_FILES['image']['tmp_name'];

		move_uploaded_file($imgTmpName, $storingDirectory.'/'.$imageName);

		$_FILES['document']['name'] = str_replace(' ', '', $printerNameConc).'Manual';
		$documentName = $_FILES['document']['name'];
		$documentTmpName = $_FILES['document']['tmp_name'];

		move_uploaded_file($documentTmpName, $storingDirectory.'/'.$documentName);

		$sql = "INSERT INTO manuals (printerName, printerNameKey, descriptionKey, image, description, document, video, request, username, firstName, lastName, ratings, overallRating) VALUES ('$printerName', '$printerNameKey', '$descriptionKey', '$imageName', '$description', '$documentName', '$video', '$request', '$username', '$firstName', '$lastName', 0, 0)";	
		mysqli_query($connection, $sql);

		$sql = "SELECT * FROM manuals WHERE printerName = '$printerName'";
		$resultData = mysqli_query($connection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);

		$manualId = $resultData['id'];

		create_ratingDatabase($ratingsConnection, $manualId);

		$video = str_replace('/watch?v=', '/embed/', $video);

		$file = '../manuals/temeplate/temeplate.txt';
		
		$fileText = file_get_contents($file);

		$fileText = str_replace("PRINTER NAME CONC", $printerNameConc, $fileText);
		$fileText = str_replace("PRINTER NAME", $printerName, $fileText);
		$fileText = str_replace("SETUP LINK", $video, $fileText);
		$fileText = str_replace("DESCRIPTION", $description, $fileText);
		$fileText = str_replace("MANUAL ID", $manualId, $fileText);

		$newfile = '../manuals/'.$printerNameConc.'.php';

		copy($file, $newfile);

		file_put_contents($newfile, $fileText);

		echo json_encode(null);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			echo json_encode(0);
			exit;
		}
	}

?>