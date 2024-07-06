<?php
	include 'generalFunctions/generalFunctions.php';

	if(!checkIfConnected())
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
	<body id = "body" class = "flex flex-col gap-5 sm:gap-6 pb-24">
		<img src="generalIcons/returnIcon.png" alt="" class = "h-7 w-7 mt-6 ml-3 sm:ml-6 md:mt-10 md:ml-12" onclick = "returnToLastPage()">
		<div class = "flex flex-col justify-center items-center gap-8 sm:gap-10">
			<h1 class = "font-bold text-2.5xl text-primaryColor">Adaugă un curs</h1>
			<div class = "relative">
				<input type="text" id="titleInput" class = "h-14 sm:w-96 md:w-105 lg:w-120 w-72 text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
				<h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Titlul cursului</h1>
			</div>
			<div class = "flex items-center relative h-32 sm:w-96 md:w-105 lg:w-120 w-72 shadow-lg rounded-xl border border-primaryColor">
				<textarea type="text" id="descriptionInput" class = "resize-none h-24 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
				<h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Descriere</h1>
			</div>
			<div id="error" class = "w-72 sm:w-88 md:w-105 lg:w-120 flex items-center gap-2 hidden">
				<img src="generalIcons/errorIcon.png" alt="" class = "w-7 h-7 md:w-8 md:h-8">
				<p class = "text-black text-xs md:text-sm">Toate câmpurile trebuiesc completate!</p>
			</div>
			<div class = "flex justify-between items-center w-80 sm:w-96 md:w-105 lg:w-120">
				<button id="submit" class = "w-32 h-9 items-center flex justify-center text-xs sm:text-sm sm:w-36 sm:h-10 bg-primaryColor/80 rounded-lg font-normal text-white shadow-md shadow-black/30">Adaugă cursul</button>
				<button id="newSection" class = "w-10 h-10 text-xl text-white bg-primaryColor rounded-full">+</button>
			</div>
			<div id = "popUp" class = "fixed top-0 left-0 w-full h-full backdrop-blur-sm bg-primaryColor bg-opacity-10 flex justify-center items-center hidden">
				<div class = "w-82 sm:w-105 sm:h-44 h-40 md:w-135 shadow-xl shadow-black/15 absolute bg-white flex items-center">
					<div class = "flex flex-col gap-3 md:gap-4 ml-5 w-72 sm:w-96 md:w-120">	
						<h1 class = "text-sm md:text-base">Adaugă o secțiune nouă</h1>
						<div class = "flex flex-col gap-5">
							<form id="courseSectionForm">
								<select id="newSectionTypeInput" type="dropdown" class = "text-xs md:text-sm h-8 w-full text-sm pl-2 outline-none border border-primaryColor">
									<option value="subtitle">Subtitlu</option>
									<option value="text">Text</option>
									<option value="image">Imagine</option>
									<option value="tripleImage">Imagini multiple</option>
									<option value="textImage">Imagine și text</option>
									<option value="tripleImageDescription">Imagini cu descriere</option>
									<option value="video">Videoclip</option>
								</select>
							</form>
							<div class = "flex gap-4">
								<button id="addSection" class = "w-28 h-8 md:w-30 md:h-9 items-center flex justify-center text-xs md:text-sm text-white bg-primaryColor/80 rounded-lg font-normal shadow-md shadow-black/20">Adaugă</button>
								<button id="cancel" class = "w-28 h-8 md:w-30 md:h-9 items-center flex justify-center text-xs md:text-sm text-primaryColor border border-primaryColor/80 rounded-lg font-normal shadow-md shadow-black/20">Anulează</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
	<script src="preview.js"></script>
	<script src="javascript/return.js"></script>
	<script src="javascript/manageSections.js"></script>
	<script src="javascript/addCourse.js"></script>
</html>

