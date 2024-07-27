<?php
	include 'databases/databases.php';

	$sql = "SELECT COUNT(*) AS row_count FROM manuals";
	$stmt = mysqli_prepare($conn['main'], $sql);
	mysqli_stmt_execute($stmt);
    $manualsNumber = mysqli_stmt_get_result($stmt);
    $manualsNumber = mysqli_fetch_assoc($manualsNumber);
	
	$sql = "SELECT COUNT(*) AS row_count FROM users";
	$stmt = mysqli_prepare($conn['main'], $sql);
	mysqli_stmt_execute($stmt);
    $usersNumber = mysqli_stmt_get_result($stmt);
    $usersNumber = mysqli_fetch_assoc($usersNumber);

	$sql = "SELECT COUNT(*) AS row_count FROM courses";
	$stmt = mysqli_prepare($conn['main'], $sql);
	mysqli_stmt_execute($stmt);
    $coursesNumber = mysqli_stmt_get_result($stmt);
    $coursesNumber = mysqli_fetch_assoc($coursesNumber);

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
	
	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<body class = "mt-12">
		<section class = "h-96 sm:h-120 md:h-full overflow-hidden relative">
			<div class = "masked-video">	
				<video class="w-full h-full object-fill" autoplay muted loop>
					<source src="images&videoes/heroVideo.mp4" type="video/mp4">
				</video>
			</div>
			<div class ="gradient-overlay w-full h-full absolute top-0 left-0 opacity-45"></div>
			<div class = "w-full absolute top-1/4 left-0 flex flex-col items-center gap-12 md:gap-24">
				<div class = "flex flex-col items-center justify-center gap-4 md:gap-8">
					<h1 class = "px-6 text-xl sm:text-3xl md:text-4xl text-white font-semibold text-center drop-shadow-text">Transformă-ți ideile în realitate cu ajutorul imprimării 3D!</h1>
					<div class = "w-60 sm:w-72 md:w-135 h-px bg-white/40"></div>
					<h1 class = "text-base sm:text-xl md:text-2xl text-white font-semibold text-center drop-shadow-text">DESCOPERĂ, ÎNVAȚĂ ȘI CREEAZĂ</h1>
				</div>
				<a href = "signUp.php" class = "w-32 h-9 md:text-base md:w-40 md:h-10 items-center flex justify-center bg-primaryColor rounded-lg text-sm text-white">Începe acum</a>
			</div>
		</section>
		<section class = "mt-2 md:mt-16 flex flex-col lg:flex-row justify-center items-center gap-11 sm:gap-14 lg:gap-20">
			<div class = "flex flex-col items-center justify-center md:flex-row gap-11 sm:gap-14 md:gap-20">
				<div class = "flex flex-col items-center justify-center gap-7">
					<h1 class = "font-bold text-2xl text-primaryColor font-sans">MANUALE IMPRIMATE</h1>
					<div class = "w-80 h-72 md:w-96 md:h-80 bg-secondaryColor rounded-xl shadow-md shadow-primaryColor/40 flex flex-col items-center gap-2.5 md:gap-4">
						<img src="images&videoes/featuresManuals.jpg" alt="" class = "rounded-t-xl w-80 md:w-96 md:h-54 h-44">
						<p class = "text-xs text-center px-2">Punem la dispoziție manualele pentru imprimantele 3D care sunt esențiale pentru utilizatori, oferind informații detaliate despre asamblare, configurare și utilizare, precum și sfaturi pentru rezolvarea problemelor și optimizarea rezultatelor.</p>
					</div>
				</div>
				<div class = "flex flex-col items-center justify-center gap-7">
					<h1 class = "font-bold text-2xl text-primaryColor font-sans">CURSURI</h1>
					<div class = "w-80 h-72 md:w-96 md:h-80 bg-secondaryColor rounded-xl shadow-md shadow-primaryColor/40 flex flex-col items-center gap-2.5 md:gap-4">
						<img src="images&videoes/featuresCourses.jpg" alt="" class = "rounded-t-xl w-80 md:w-96 md:h-54 h-44">
						<p class = "text-xs text-center px-2">Alege dintr-o gamă variată de cursuri de printare 3D, potrivite pentru toate nivelurile de experiență. De la noțiuni introductive pentru începători până la tehnici avansate pentru utilizatori experimentați, cursurile noastre acoperă tot ce ai nevoie!</p>
					</div>
				</div>
			</div>
			<div class = "flex flex-col items-center justify-center gap-7">
				<h1 class = "font-bold text-2xl text-primaryColor font-sans">ASISTENȚĂ AI</h1>
				<div class = "w-80 h-72 md:w-96 md:h-80 bg-secondaryColor rounded-xl shadow-md shadow-primaryColor/40 flex flex-col items-center gap-2.5 md:gap-4">
					<img src="images&videoes/featuresAI.jpg" alt="" class = "rounded-t-xl w-80 md:w-96 md:h-54 h-44">
					<p class = "text-xs text-center px-2">Asistența AI oferă suport individualizat și soluții adaptate nevoilor utilizatorilor, răspunzând rapid la întrebări tehnice, oferind sugestii pentru optimizarea procesului de printare și sfaturi personalizate pentru atingerea obiectivelor.</p>
				</div>
			</div>
		</section>
		<section class = "mt-12 md:mt-28">
			<div class = "h-16 sm:h-20 md:h-24 bg-primaryColor/80 flex gap-10 sm:gap-16 md:gap-32 justify-center items-center">
				<div class = "flex gap-1 sm:gap-2 justify-center items-end">
					<h2 class = "text-sm text-white sm:text-xl md:text-2xl">Cursuri.</h2>
					<h1 class = "text-2xl font-bold text-white leading-27px sm:leading-9 sm:text-3xl md:leading-11.5 md:text-4xl"><?php echo $coursesNumber['row_count']?></h1>
				</div>
				<div class = "flex gap-1 sm:gap-2 justify-center items-end">
					<h2 class = "text-sm text-white sm:text-xl md:text-2xl">Manuale.</h2>
					<h1 class = "text-2xl font-bold text-white leading-27px sm:leading-9 sm:text-3xl md:leading-11.5 md:text-4xl"><?php echo $manualsNumber['row_count']?></h1>
				</div>
				<div class = "flex gap-1 sm:gap-2 justify-center items-end">
					<h2 class = "text-sm text-white sm:text-xl md:text-2xl">Utilizatori.</h2>
					<h1 class = "text-2xl font-bold text-white leading-27px sm:leading-9 sm:text-3xl md:leading-11.5 md:text-4xl"><?php echo $usersNumber['row_count']?></h1>
				</div>	
			</div>
		</section>
		<section class = "mt-12 md:mt-28 flex justify-center items-center gap-8">
			<div class = "w-1 h-70 sm:h-80 rounded-xl bg-primaryColor"></div>
			<div class = "flex flex-col gap-7 sm:gap-9">
				<h1 class = "font-bold text-2xl text-primaryColor font-sans sm:text-3xl leading-6">COMUNITATE</h1>	
				<p class = "w-68 sm:w-80 md:w-105 text-xs sm:text-sm md:text-base">Comunitatea noastră oferă un spațiu sigur și interactiv unde utilizatorii pot împărtăși idei, sfaturi și experiențe. Indiferent dacă sunt experimentați sau începători, membri se pot conecta și pot colabora pentru a învăța și a împărtăși pasiunea pentru această tehnologie inovatoare.</p>
				<a href = "https://discord.gg/36bhhQe3Nu" target = "_blank" class = "w-32 h-9 md:text-base md:w-40 md:h-10 items-center flex justify-center bg-primaryColor rounded-lg text-sm text-white">Alătură-te</a>
			</div>
		</section>
    </body>

	<?php include 'includes/footer.php' ?>
</html>

<script src="https://cdn.botpress.cloud/webchat/v2/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/48385c87-3c59-40fe-b72c-ff429e635db2/webchat/v2/config.js"></script>
