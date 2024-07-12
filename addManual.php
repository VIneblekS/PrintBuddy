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
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/customClases.css">
		<title>Printbuddy</title>
	</head>

	<body id = "body" class = "flex flex-col gap-5 sm:gap-6 pb-24">
		<img src="generalIcons/returnIcon.png" alt="" class = "h-7 w-7 mt-6 ml-3 sm:ml-6 md:mt-10 md:ml-12" onclick = "returnToLastPage()">
		<div class = "flex flex-col justify-center items-center gap-8 sm:gap-10">
			<h1 class = "font-bold text-2.5xl text-primaryColor">Adaugă un manual</h1>
			<form id = "addManualForm" class = "flex flex-col justify-center items-center gap-8 sm:gap-10">
                <div class = "relative">
                    <input type="text" name = "name" class = "h-14 sm:w-96 md:w-105 lg:w-120 w-72 text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
                    <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Numele imprimantei</h1>
                </div>
                <div class = "flex items-center relative h-32 sm:w-96 md:w-105 lg:w-120 w-72 shadow-lg rounded-xl border border-primaryColor">
                    <textarea type="text" name = "description" class = "resize-none h-24 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
                    <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Prezentare generală</h1>
                </div>
                <div class = "w-80 sm:w-105 md:w-120 lg:w-135 flex flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
                    <div class = "w-280px sm:w-88 md:w-105 lg:w-120">	
                        <h1 class = "text-base text-primaryColor font-bold">Imagine</h1>
                    </div>
                    <label onclick = "imagePreview(this)">
                        <input type="file" name="image" class="hidden">
                        <div class = "w-54 h-54 sm:h-60 sm:w-60 md:w-67 md:h-67 lg:w-88 lg:h-88 flex justify-center items-center border border-dashed border-placeholderGray">
                            <p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
                            <img src="" alt="" class = "w-54 h-54 sm:h-60 sm:w-60 md:w-67 md:h-67 lg:w-88 lg:h-88 hidden">
                        </div>
                    </label>
                </div>
                <div class = "w-80 sm:w-105 md:w-120 lg:w-135 flex flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
                    <div class = "w-280px sm:w-88 md:w-105 lg:w-120">	
                        <h1 class = "text-base text-primaryColor font-bold">Videoclip de setup</h1>
                    </div>
                    <div class = "flex flex-col gap-6">
                        <div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
                            <p class = "text-xs text-placeholderGray">Niciun videoclip încărcat!</p>
                            <iframe class = "w-280px h-158px sm:h-50 sm:w-88 hidden md:w-105 md:h-60 lg:w-120 lg:h-67" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <input type="text" name="video" onclick = "videoPreview(this)" placeholder = "Linkul către video" class = "w-280px sm:w-88 md:w-105 lg:w-120 outline-none placeholder:text-xs text-xs placeholder:text-placeholderGray border-b border-placeholderGray pl-2">
                    </div>
                </div>
                <div class = "w-80 sm:w-105 md:w-120 lg:w-135 flex flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
                    <div class = "w-280px sm:w-88 md:w-105 lg:w-120">	
                        <h1 class = "text-base text-primaryColor font-bold">Manual</h1>
                    </div>
                    <label onclick = "documentPreview(this)">
                        <input type="file" name="document" class="hidden" id ="document">
                        <div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
                            <p class = "text-xs text-placeholderGray">Încarcă un document!</p>
                            <iframe class = "w-280px h-158px sm:h-50 sm:w-88 hidden md:w-105 md:h-60 lg:w-120 lg:h-67" src=""></iframe>
                        </div>
                    </label>
                </div>
            </form>
			<div id="error" class = "w-80 sm:w-105 md:w-120 lg:w-135 flex items-center gap-2 hidden">
				<img src="generalIcons/errorIcon.png" alt="" class = "w-7 h-7 md:w-8 md:h-8">
				<p class = "text-black text-xs md:text-sm">Toate câmpurile trebuiesc completate!</p>
			</div>
			<button id="submit" class = "w-40 h-10 items-center flex justify-center text-sm bg-primaryColor rounded-lg font-normal text-white shadow-md shadow-black/40">Adaugă manualul</button>
    </body>
	<script src="javascript/preview.js"></script>
	<script src="javascript/return.js"></script>
    <script src="javascript/addManual.js"></script>
</html>

