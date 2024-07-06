<?php  
	function check_search(&$userSearch) {
		if (empty($_POST['userSearch']) || trim($_POST['userSearch']) == '') {
			header('Location: ../FAQ.php');
			exit;	
		} else
			$userSearch = filter_input(INPUT_POST, 'userSearch', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	}

	function toKey($text) {
		if (is_numeric($text))
			return "-";
		$token = strtok($text, " .-");
		$key = "";

		while ($token !== FALSE) {
			$key = $key.metaphone($token)." ";
			$token = strtok(" .-");
		}

		if (trim($key) == '')
			return "-";
		return $key;
	}

	function search($connection, $userSearch) {
		setcookie('search', $userSearch, null, '/', $_SERVER['HTTP_HOST'], true, true);
		$userSearchKey = toKey($userSearch);
		$sql = "SELECT * FROM faq WHERE (questionKey LIKE '%$userSearchKey%' OR question LIKE '%$userSearch%')";
		$results = mysqli_query($connection, $sql);
		$results = mysqli_fetch_all($results, MYSQLI_ASSOC);
		if ($results) {	
			$_SESSION['faqResults'] = $results;
		} else
			setcookie('resultErr', 1, null, '/', $_SERVER['HTTP_HOST'], true, true);
		header('Location: ../FAQ.php');
		exit;	
	}
?>