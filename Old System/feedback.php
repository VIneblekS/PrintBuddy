<?php 
	include 'includes/stylesIncludes.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Feedback</title>
	</head>
	<body class="flex-column m-top-40px gap-80px">
		<div class="w120px flex-center">	
			<div class="return-arrow pointer">
				<img src="images/generalElements/leftArrow.png">
			</div>
		</div>
		<div class="flex-column align-center gap-80px">
			<div>
				<h1 class="blue size30px">Spune-ne părerea ta</h1>
			</div>
			<form method="POST" class="flex-column align-center gap-60px" id="login-form">
				<div class = "flex-column gap-20px">
					<div class="flex-column gap-5px h214px">
						<textarea type="text" name="feedback" placeholder="Scrie o recenzie..." class="feedback-text-input"></textarea>
						<p class="form-error" id="feedback-error"></p>
					</div>
				</div>
				<input class = "simple-button pointer submit-form" type="submit" name="submit" value="Adaugă" id="submit">
			</form>
		</div>
	</body>

	<script src="javascript/return.js"></script>
	<script src="javascript/feedback.js"></script>
	
</html>

