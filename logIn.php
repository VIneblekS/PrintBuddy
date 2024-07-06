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
			<h1 class = "font-bold text-2.5xl text-primaryColor">Autentificare</h1>
			<form method="POST" id="logInForm" class = "flex flex-col gap-10 items-center">
					<div class = "flex flex-col gap-4">
						<div class = "flex flex-col gap-1">
							<input type="text" name="user" placeholder="Nume utilizator/Email" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
							<p id="userErr" class = "h-4 text-sm text-red-600"></p>
						</div>
						<div class = "flex flex-col gap-1">
							<input type="password" name="password" placeholder="Parolă" class = "h-14 sm:w-86 md:w-100 w-72 placeholder:text-placeholderGray placeholder:text-sm text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
							<p id="passwordErr" class = "h-4 text-sm text-red-600"></p>
						</div>	
						<div class = "flex gap-1.5 items-center">
							<input type="checkbox" name="keepConnection" value="true" id="checkbox" class = "appearance-none w-3.5 h-3.5 border border-primaryColor rounded-lg checked:bg-primaryColor/25">
							<label for="checkbox" class = "text-sm">Ține-mă conectat 7 zile</label>
						</div>
					</div>
					<input type="submit" name="logIn" value="Conectează-te" class = "w-32 h-9 items-center flex justify-center text-sm bg-primaryColor rounded-lg font-normal text-white shadow-md shadow-black/40">
			</form>
			<div class = "h-px w-56 bg-primaryColor"></div>
			<div class = "flex justify-center gap-1">
				<p class = "text-sm">Nu ai cont?</p>
				<a href="signUp.php" class = "text-sm font-bold text-primaryColor">Înregistrează-te</a>
			</div>
		</div>
	</body>

	<script src="javascript/logIn.js"></script>
	<script src="javascript/return.js"></script>
</html>

