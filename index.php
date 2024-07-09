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
	
	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<body class = "mt-12">
		<section class = "w-full h-96 sm:h-120 md:h-full overflow-hidden relative">
			<div class = "masked-video">	
				<video class="w-full h-full object-fill" autoplay muted loop>
					<source src="images&videoes/heroVideo.mp4" type="video/mp4">
				</video>
			</div>
			<div class ="gradient-overlay w-full h-full absolute top-0 left-0 opacity-45"></div>
			<div class = "w-full h-full absolute top-1/4 left-0 flex flex-col items-center gap-12 md:gap-24">
				<div class = "w-full flex flex-col items-center justify-center gap-4 md:gap-8">
					<h1 class = "px-6 text-xl sm:text-3xl text-white font-semibold text-center drop-shadow-text">Transformă-ți ideile în realitate cu ajutorul imprimării 3D!</h1>
					<div class = "w-60 sm:w-72 h-px bg-white/40"></div>
					<h1 class = "text-md sm:text-xl text-white font-semibold text-center drop-shadow-text">DESCOPERĂ, ÎNVAȚĂ ȘI CREEAZĂ</h1>
				</div>
				<a href = "signUp.php" class = "w-32 h-9 items-center flex justify-center text-xs sm:text-sm sm:w-36 sm:h-10 bg-primaryColor rounded-lg  font-normal text-white shadow-md shadow-black/40">ÎNCEPE ACUM</a>
			</div>
		</section>
		<section class = "w-full mt-2 md:mt-16 flex flex-col lg:flex-row justify-center gap-11 sm:gap-14 lg:gap-20">
			<div class = "flex flex-col items-center justify-center md:flex-row gap-11 sm:gap-14 md:gap-20">
				<div class = "flex flex-col items-center gap-7">
					<div class = "flex justify-center">	
						<h1 class = "font-bold text-2xl text-primaryColor font-sans sm:text-3xl">MANUALE IMPRIMATE</h1>
					</div>
					<div class = "w-300px h-70 sm:h-84 sm:w-96 bg-secondaryColor rounded-xl shadow-md shadow-primaryColor/40 flex flex-col gap-2.5">
						<img src="images&videoes/featuresManuals.jpg" alt="" class = "rounded-t-xl w-300px h-180px sm:h-52 sm:w-96">
						<div class = "flex justify-center items-center">
							<p class = "text-xs text-center w-11/12 sm:text-sm">Punem la dispoziție manualele pentru imprimantele 3D care sunt esențiale pentru utilizatori, oferind informații detaliate despre asamblare, configurare și utilizare, precum și sfaturi pentru rezolvarea problemelor și optimizarea rezultatelor.</p>
						</div>
					</div>
				</div>
				<div class = "flex flex-col items-center gap-7">
					<div class = "flex justify-center">	
						<h1 class = "font-bold text-2xl text-primaryColor font-sans sm:text-3xl">CURSURI</h1>
					</div>
					<div class = "w-300px h-70 sm:h-84 sm:w-96 bg-secondaryColor rounded-xl shadow-md shadow-primaryColor/40 flex flex-col gap-2.5">
						<img src="images&videoes/featuresCourses.jpg" alt="" class = "rounded-t-xl w-300px h-180px sm:h-52 sm:w-96">
						<div class = "flex justify-center items-center">
							<p class = "text-xs text-center w-11/12 sm:text-sm">Alege dintr-o gamă variată de cursuri de printare 3D, potrivite pentru toate nivelurile de experiență. De la noțiuni introductive pentru începători până la tehnici avansate pentru utilizatori experimentați, cursurile noastre acoperă tot ce ai nevoie!</p>
						</div>
					</div>
				</div>
			</div>
			<div class = "flex flex-col items-center gap-7">
				<div class = "flex justify-center">	
					<h1 class = "font-bold text-2xl text-primaryColor font-sans sm:text-3xl">ASISTENȚĂ AI</h1>
				</div>
				<div class = "w-300px h-70 sm:h-84 sm:w-96 bg-secondaryColor rounded-xl shadow-md shadow-primaryColor/40 flex flex-col gap-2.5">
					<img src="images&videoes/featuresAI.jpg" alt="" class = "rounded-t-xl w-300px h-180px sm:h-52 sm:w-96">
					<div class = "flex justify-center items-center">
						<p class = "text-xs text-center w-11/12 sm:text-sm">Asistența AI oferă suport individualizat și soluții adaptate nevoilor utilizatorilor, răspunzând rapid la întrebări tehnice, oferind sugestii pentru optimizarea procesului de printare și sfaturi personalizate pentru atingerea obiectivelor.</p>
					</div>
				</div>
			</div>
		</section>
		<section class = "w-full mt-12 md:mt-28">
			<div class = "w-full h-20 sm:h-24 bg-primaryColor/80 flex flex-col gap-1 sm:flex-row sm:gap-10 md:gap-40 justify-center items-center">
				<div class = "flex justify-center items-center gap-8 sm:gap-10 md:gap-40"> 
					<div class = "flex gap-1 sm:gap-2 justify-center items-end">
						<h2 class = "text-sm text-white sm:text-lg">Cursuri.</h2>
						<h1 class = "text-2xl font-bold text-white leading-27px sm:text-3xl">20</h1>
					</div>
					<div class = "flex gap-1 sm:gap-2 justify-center items-end">
						<h2 class = "text-sm text-white sm:text-lg">Manuale.</h2>
						<h1 class = "text-2xl font-bold text-white leading-27px sm:text-3xl">50</h1>
					</div>
				</div>
				<div class = "flex gap-1 sm:gap-2 justify-center items-end">
					<h2 class = "text-sm text-white sm:text-lg">Utilizatori lunar.</h2>
					<h1 class = "text-2xl font-bold text-white leading-27px sm:text-3xl">16</h1>
				</div>	
			</div>
		</section>
		<section class = "mt-12 md:mt-28 w-full flex justify-center items-center gap-8">
			<div class = "w-1 h-80 rounded-xl bg-primaryColor"></div>
			<div class = "flex flex-col gap-7 sm:gap-9 md:items-center">
				<h1 class = "font-bold text-2xl text-primaryColor font-sans sm:text-3xl">COMUNITATE</h1>	
				<p class = "w-52 sm:w-80 md:w-100 text-xs sm:text-sm md:text-base md:text-center">Comunitatea noastră oferă un spațiu sigur și interactiv unde utilizatorii pot împărtăși idei, sfaturi și experiențe. Indiferent dacă sunt experimentați sau începători, membri se pot conecta și pot colabora pentru a învăța și a împărtăși pasiunea pentru această tehnologie inovatoare.</p>
				<a href = "https://discord.gg/uMADwGmThs" target = "_blank" class = "w-32 h-9 items-center flex justify-center bg-primaryColor rounded-lg text-sm sm:text-base font-normal text-white">Alătură-te</a>
			</div>
			<div class = "w-1 h-80 rounded-xl bg-primaryColor hidden md:block"></div>
		</section>
    </body>

	<?php include 'includes/footer.php' ?>
</html>

<script src="https://cdn.botpress.cloud/webchat/v2/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/48385c87-3c59-40fe-b72c-ff429e635db2/webchat/v2/config.js"></script>
