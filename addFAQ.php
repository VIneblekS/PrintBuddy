<?php
	include 'generalFunctions/generalFunctions.php';

	if(checkIfConnected()) {
		
		session_start();

		$admin = $_SESSION['admin'];

        if(!$admin)
            redirectToIndex();
    } else
		redirectToIndex();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="javascript/tailwindAddOns.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/customClases.css">
		<title>Printbuddy</title>
	</head>
	
	<body id = "body" class = "flex flex-col gap-5 sm:gap-6 pb-24">
		<img src="generalIcons/returnIcon.png" alt="" class = "h-7 w-7 mt-6 ml-3 sm:ml-6 md:mt-10 md:ml-12" onclick = "returnToLastPage()">
		<div class = "flex flex-col justify-center items-center gap-8 sm:gap-10">
			<h1 class = "font-bold text-2.5xl text-primaryColor">Adaugă o întrebare</h1>
			<form id = "addFAQForm" class = "flex flex-col justify-center items-center gap-8 sm:gap-10">
                <div class = "flex items-center relative h-32 sm:w-96 md:w-105 lg:w-120 w-72 shadow-lg rounded-xl border border-primaryColor">
                    <textarea type="text" name = "question" class = "resize-none h-24 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
                    <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Întrebare</h1>
                </div>
                <div class = "flex items-center relative h-32 sm:w-96 md:w-105 lg:w-120 w-72 shadow-lg rounded-xl border border-primaryColor">
                    <textarea type="text" name = "answer" class = "resize-none h-24 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
                    <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Răspuns</h1>
                </div>
            </form>
			<div id="error" class = "w-72 sm:w-96 md:w-105 lg:w-120 flex items-center gap-2 hidden">
				<img src="generalIcons/errorIcon.png" alt="" class = "w-7 h-7 md:w-8 md:h-8">
				<p class = "text-black text-xs md:text-sm">Toate câmpurile trebuiesc completate!</p>
			</div>
			<button id="submit" class = "w-40 h-10 items-center flex justify-center text-sm bg-primaryColor rounded-lg font-normal text-white shadow-md shadow-black/40">Adaugă întrebarea</button>
		</div>
    </body>
	<script src="javascript/return.js"></script>
    <script src="javascript/addFAQ.js"></script>
</html>

