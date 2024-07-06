<?php
	include 'generalFunctions/generalFunctions.php';

	if(checkIfConnected())
		redirectToIndex();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="javascript/tailwindAddOns.js"></script>
		<link rel="stylesheet" href="css/customClases.css">
		<title>Printbuddy</title>
	</head>
	<body class = "flex flex-col gap-5 sm:gap-6 pb-24">
		<img src="generalIcons/returnIcon.png" alt="" class = "h-7 w-7 mt-6 ml-3 sm:ml-6 md:mt-10 md:ml-12" onclick = "returnToLastPage()">
		<div class = "flex flex-col justify-center items-center gap-8 sm:gap-10">
			<h1 class = "font-bold text-2.5xl sm:text-3xl text-primaryColor">Înregistrare</h1>
			<form method="POST" id="signUpForm" class = "flex flex-col gap-10 items-center">
				<div class = "flex flex-col gap-4">
					<div class = "flex flex-col gap-1">
						<input type="text" name="username" placeholder="Nume utilizator" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
						<p id = "usernameErr" class = "h-4 text-sm text-red-600"></p>
					</div>
					<div class = "flex flex-col gap-1">
						<input type="text" name="firstName" placeholder="Nume" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
						<p id = "firstNameErr" class = "h-4 text-sm text-red-600"></p>
					</div>
					<div class = "flex flex-col gap-1">
						<input type="text" name="lastName" placeholder="Prenume" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
						<p id = "lastNameErr" class = "h-4 text-sm text-red-600"></p>
					</div>
					<div class = "flex flex-col gap-1">
						<input type="text" name="email" placeholder="Email" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
						<p id = "emailErr" class = "h-4 text-sm text-red-600"></p>
					</div>
					<div class = "flex flex-col gap-1">
						<input type="password" name="password" placeholder="Parolă" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
						<p id = "passwordErr" class = "h-4 text-sm text-red-600"></p>
					</div>
					<div class = "flex flex-col gap-1">
						<input type="password" name="passwordConfirm" placeholder="Confirmare parolă" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
						<p id = "passwordConfirmErr" class = "h-4 text-sm text-red-600"></p>
					</div>
				</div>
				<input type="submit" name="signUp" value="Crează cont" class = "w-32 h-9 items-center flex justify-center text-sm bg-primaryColor rounded-lg font-normal text-white shadow-md shadow-black/40">
			</form>
			<div class = "h-px w-56 bg-primaryColor"></div>
			<div class = "flex justify-center gap-1">
				<p class = "text-sm">Ai deja cont?</p>
				<a href="logIn.php" class = "text-sm font-bold text-primaryColor">Conectează-te</a>
			</div>
		</div>
	</body>

    <script src = "javascript/signUp.js"></script>
	<script src="javascript/return.js"></script>
</html>