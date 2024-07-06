<?php 
	include 'includes/stylesIncludes.php';

	if (isset($_COOKIE['connection'])) {
		header('Location: index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
	</head>
	<body class="flex-column m-top-40px gap-80px">
		<div class="w120px flex-center">	
			<div class="return-arrow pointer">
				<img src="images/generalElements/leftArrow.png">
			</div>
		</div>
		<div class="flex-column align-center gap-80px">
			<div>
				<h1 class="blue size30px">Autentifică-te</h1>
			</div>
			<form method="POST" class="flex-column align-center gap-60px" id="login-form">
				<div class="flex-column gap-15px">
					<div class = "flex-column gap-20px">
						<div class="flex-column gap-5px h72px">
							<input type="text" name="user" placeholder="Username/Email" class="basic-text-input" id = "user">
							<p class="form-error" id="user-error"></p>
						</div>
						<div class="flex-column gap-5px h72px">
							<input type="password" name="password" placeholder="Password" class="basic-text-input" id="password">
							<p class="form-error" id="password-error"></p>
						</div>
					</div>
					<div class="flex-left align-center gap-5px">
						<input type="checkbox" name="keepConnection" value = "true" id="keepConnection">
						<label class="size15px">Ține-mă conectat 7 zile</label>
					</div>
				</div>
				<div class="flex-column gap-10px align-center">
					<input class = "simple-button pointer submit-form" type="submit" name="login" value="Conectează-te" id="submit">
					<div class="flex-center gap-3px">
						<h2 class="normal blue size15px">Nu ai cont?</h2>
						<a class="bold blue size15px pointer" href="signUp.php">Înregistrează-te</a>
					</div>
				</div>
			</form>
		</div>
	</body>

	<script src="javascript/return.js"></script>
	<script src="javascript/logIn.js"></script>
	
</html>

