<?php 
	include 'chatSystemProcess/sendMessage.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HTML Form</title>
	</head>
	<body>
		<form action = "chatSystemProcess/sendMessage.php" method="POST">
			<div>
				<label>Message</label>
				<input type="text" name="message">
			</div>
			<div>
				<input type="submit" name="send" value="Send">
			</div>
		</form>
		<?php  
			$sqlMessages = "SELECT * FROM chat";
			$messages = mysqli_query($connection, $sqlMessages);
			$messages = mysqli_fetch_all($messages, MYSQLI_ASSOC);
		?>


		<h2>CHAT</h2>

		<?php foreach ($messages as $message): ?>
			<div>
				<h4><?php echo $message['message'] ?></h4>
			</div>
			<div>				
				<h5><?php echo $message['senderUsername']; ?></h5>
			</div>
		<?php if($_SESSION['username'] == $message['senderUsername'] OR $_SESSION['admin']): ?>
			<form action = "http://localhost/InfoEdProject/chatSystemProcess/deleteMessage.php" method = 'POST'>
				<button type="submit" name="delete" value ="<?php echo $message['id'] ?>"> DELETE </button> 
			</form>		
		<?php endif ?>
	
		<?php endforeach; ?>
	</body>
</html>

