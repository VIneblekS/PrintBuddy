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
		<title>Sign Up</title>
	</head>
	<body class="flex-column m-top-40px gap-80px">
		<div class="w120px flex-center">	
			<div class="return-arrow pointer">
				<img src="images/generalElements/leftArrow.png">
			</div>
		</div>
		<div class="flex-column align-center gap-80px">
			<div>
				<h1 class="blue size30px">Înregistrează-te</h1>
			</div>
			<form method="POST" class="flex-column align-center gap-60px" id="signup-form">
				<div class="flex-space-between gap-60px">
					<div class="flex-column gap-20px">
						<div class="flex-column gap-5px h72px">
							<input type="text" name="username" placeholder="Nume utilizator" class="basic-text-input" id="username">
							<p class="form-error" id="username-error"></p>
						</div>
						<div class="flex-column gap-5px h72px">
							<input type="text" name="firstName" placeholder="Nume" class="basic-text-input" id="firstName">
							<p class="form-error" id="firstName-error"></p>
						</div>
						<div class="flex-column gap-5px h72px">
							<input type="text" name="lastName" placeholder="Prenume" class="basic-text-input" id="lastName">
							<p class="form-error" id="lastName-error"></p>
						</div>
					</div>
					<div class="flex-column gap-20px">
						<div class="flex-column gap-5px h72px">
							<input type="text" name="email" placeholder="Email" class="basic-text-input" id="email">
							<p class="form-error" id="email-error"></p>
						</div>
						<div class="flex-column gap-5px h72px">
							<input type="password" name="password" placeholder="Parolă" class="basic-text-input" id="password">
							<p class="form-error" id="password-error"></p>
						</div>
						<div class="flex-column gap-5px h72px">
							<input type="password" name="passwordConfirm" placeholder="Confirmare parolă" class="basic-text-input" id="passwordConfirm">
							<p class="form-error" id="passwordConfirm-error"></p>
						</div>
					</div>
				</div>
				<div class="flex-column gap-10px align-center">
					<input class = "simple-button pointer" type="submit" name="signup" value="Crează cont" id="submit">
					<div class="flex-center gap-3px">
						<h2 class="normal blue size15px">Ai deja cont?</h2>
						<a class="bold blue size15px pointer" href="logIn.php">Autentifică-te</a>
					</div>
				</div>
			</form>
		</div>
	</body>

	<script src="javascript/return.js"></script>
	<script src="javascript/signUp.js"></script>

</html>