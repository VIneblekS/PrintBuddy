<?php  
	function check_search(&$userSearch) {
		if (empty($_POST['userSearch']) || trim($_POST['userSearch']) == '') {
			header('Location: ../manuals.php');
			exit;	
		} else
			$userSearch = filter_input(INPUT_POST, 'userSearch', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}

	function addSerachToHistory($historyConnection, $userSearch) {
		$date_time = date('Y-m-d H:i:s', time());
		$sql = "INSERT INTO ".$_SESSION['username']." (search, searchTime) VALUES ('$userSearch', '$date_time')";
		mysqli_query($historyConnection, $sql);
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

	function search($connection, $historyConnection, $userSearch) {
		setcookie('search', $userSearch, null, '/', $_SERVER['HTTP_HOST'], true, true);
		if (isset($_COOKIE['connection']))
			addSerachToHistory($historyConnection, $userSearch);
		$userSearch = toKey($userSearch);
		$sql = "SELECT * FROM manuals WHERE (printerNameKey LIKE '%$userSearch%' OR description LIKE '%$userSearch%')";
		$results = mysqli_query($connection, $sql);
		$results = mysqli_fetch_all($results, MYSQLI_ASSOC);
		if ($results) {
			$_SESSION['manualResults'] = $results;
		} else
			setcookie('resultErr', 1, null, '/', $_SERVER['HTTP_HOST'], true, true);
		header('Location: ../manuals.php');
		exit;	
	}

	function deleteSearch($historyConnection, $searchId) {
		$sql = "DELETE FROM ".$_SESSION['username']." WHERE id = $searchId";
		mysqli_query($historyConnection, $sql);
	}

	function checkIfConnected() {
		if (!isset($_COOKIE['connection'])) {
			header('Location: ../index.php');
			exit;
		}
	}
?>