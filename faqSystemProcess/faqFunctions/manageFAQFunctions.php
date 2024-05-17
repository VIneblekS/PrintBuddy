<?php 	
	function delete_faq($connection, $faqId) {
		$sql = "DELETE FROM faq WHERE id = '$faqId'";
		mysqli_query($connection, $sql);
		header('Location: ../FAQ.php');
		exit;
	}

	function deny_faq($connection, $faqId) {
		$sql = "DELETE FROM faq WHERE id = '$faqId'";
		mysqli_query($connection, $sql);
	}

	function approve_faq($connection, $faqId) {
		$sql = "UPDATE faq SET request = false WHERE id = '$faqId'";
		mysqli_query($connection, $sql);
	}

	function checkIfAdmin() {
		if (!isset($_COOKIE['connection']) || $_SESSION['admin'] == 0) {
			header('Location: ../FAQ.php');
			exit;
		}
	}
?>