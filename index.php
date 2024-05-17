<?php
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';
	include 'includes/calculateStats.php';	  

	$sql = "SELECT * FROM reviews";
	$resultData = mysqli_query($connection, $sql);
	$resultData = mysqli_fetch_all($resultData, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print Buddy</title>
</head>
<body>
	
	<?php include 'includes/navbar.php'; ?>
	<?php include 'includes/sidebar.php'; ?>
	
	<section class="flex-center align-center blue-30T-bg top-bottom-5per m-top-65px">
		<div class="flex-center w75per gap-1dt5per">
			<div class="hero-images flex-column align-center gap-10px">
				<div class="gap-3per flex-center align-center">
					<div class="img1"><img src="images/homePage/heroImage_1.jpg"></div>
					<div class="img2"><img src="images/homePage/heroImage_2.jpg"></div>
					<div class="img3"><img src="images/homePage/heroImage_3.jpg"></div>
				</div>
				<div class="gap-3per flex-center align-center">
					<div class="img4"><img src="images/homePage/heroImage_4.jpg"></div>
					<div class="img5"><img src="images/homePage/heroImage_5.jpg"></div>
					<div class="img6"><img src="images/homePage/heroImage_6.jpg"></div>
					<div class="img7"><img src="images/homePage/heroImage_7.jpg"></div>
				</div>			
			</div>
			<div class="w40per flex-center align-center white-bg">
				<div class="full-5per flex-center align-bottom h85per">
					<div class="hero-text-wrapper flex-column gap-24px">
						<h2 class="subtitle flex-left">Bun venit!</h2>
						<p class="size18px black flex-left">
							Bine ați venit pe site-ul nostru dedicat utilizării imprimantelor 3D! Explorăm fascinantul univers al imprimării 3D, oferind informații practice, sfaturi utile și ghiduri pas cu pas pentru toți cei pasionați.
						</p>
						<div class="flex-left">
							<a href="manuals.php" class="simple-button">Caută un manual</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="flex-center grey-bg w100per top-bottom-5per">
		<div class="w70per flex-center align-center">
			<div class="flex-column flex-1 gap-24px">	
				<div class="flex-left">
					<h2 class="subtitle">Despre Tips&Prints</h2>
				</div>
				<div class="flex-left gap-24px">
					<p class="w100per size18px">
						Ne angajăm să oferim o gamă variată de informații, îndrumări practice, manuale și soluții inovatoare pentru utilizarea eficientă a imprimantelor 3D. Indiferent dacă sunteți începători curioși sau experimentați, vă 	invităm să vă alăturați comunității noastre și să vă bucurați de experiența pe care noi o oferim.
					</p>
				</div>
				<div class="flex-left">
					<a href="about.php" class="simple-button">Despre noi</a>
				</div>
			</div>	
			<div class="flex-center flex-1 align-center">
				<div class="img17">
					<img src="images/homePage/homePageAboutImg.png">
				</div>
			</div>
		</div>
	</section>
	
	<section class="flex-center grey-bg top-bottom-4per">
		<div class="flex-column gap-60px w65per">
			<div class="flex-center">
				<h1 class="title">Facilități</h1>
			</div>
			<div class="flex-space-between align-strech">
				<div class="card-shadow full-3per flex-column align-center white-bg w21per"> 
					<h2 class="subtitle">MANUALE</h2>
					<p class="top-bottom-12dt5per text-center size18px">
						Manualele pentru imprimante 3D sunt esențiale pentru utilizatorii care doresc să exploreze întregul potențial al acestor tehnologii inovatoare. Ele oferă informații detaliate despre asamblarea, configurarea și utilizarea lor, împreună cu sfaturi practice pentru rezolvarea problemelor comune și optimizarea rezultatelor.
					</p>
				</div>
				<div class="card-shadow full-3per flex-column align-center white-bg w21per"> 
					<h2 class="subtitle">COMUNITATE</h2>
					<p class="top-bottom-12dt5per text-center size18px">
						Comunitatea noastră oferă un spațiu sigur și interactiv unde utilizatorii pot împărtăși idei, sfaturi și experiențe. Indiferent dacă sunt experimentați sau începători, membri se pot conecta și pot colabora pentru a învăța și a împărtăși pasiunea pentru această tehnologie inovatoare.
					</p>
				</div>
				<div class="card-shadow full-3per flex-column align-center white-bg w21per"> 
					<h2 class="subtitle">ASISTENȚĂ AI </h2>
					<p class="top-bottom-12dt5per text-center size18px">
						Asistența AI este proiectată pentru a oferi suport individualizat și soluții adaptate nevoilor fiecărui utilizator. Aceasta va oferi răspunsuri rapide la întrebările tehnice, sugestii pentru optimizarea procesului de printare și sfaturi personalizate pentru a ajuta utilizatorii să-și atingă obiectivele cât mai rapid.					
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="flex-center align-center blue-90T-bg top-bottom-2per">
		<div class="flex-space-between align-center w70per">
			<div class="flex-column align-center gap-24px">
				<h2 class="subtitle white"><?php echo $monthlyUsers ?></h2>
				<h2 class="subtitle white text-center">UTILIZATORI LUNARI</h2>
			</div>
			<div class="flex-column align-center gap-24px">
				<h2 class="subtitle white"><?php echo $activeManuals ?></h2>
				<h2 class="subtitle white text-center">MANUALE ACTIVE</h2>
			</div>
			<div class="flex-column align-center gap-24px">
				<h2 class="subtitle white"><?php echo $onlineUsers ?></h2>
				<h2 class="subtitle white text-center">UTILIZATORI CONECTAȚI</h2>
			</div>
		
		</div>
	</section>

	<section class="flex-center align-center grey-bg top-bottom-5per gap-80px">
		<?php if($resultData): ?>
		<div class="flex-center align-center w500px gap-24px">
			<div class="previous pointer img31">
				<img src="images/generalElements/leftArrow.png">
			</div>
			<div class="w400px h170px hide-overf">
			<div class="flex-left align-center h170px slider">
				<?php foreach($resultData as $review): ?>
					<div class="w400px flex-column gap-15px h170px">
						<div class="flex-left align-center gap-24px w400px">
							<div class="circle-35px pointer profile-pic sidebar-open">
								<img class="circle-35px" src="images/generalElements/noUserPic.png">
							</div>
							<h2 class="size22px normal"><?php echo $review['firstName']." ".$review['lastName']; ?></h2>
						</div>
						<div class="flat-line w100per blue-bg"></div>
							<p class="size18px normal"><?php echo $review['review'];  ?></p>
						</div>
				<?php endforeach ?>
				</div>
			</div>
			<div class="next pointer img31">
				<img src="images/generalElements/rightArrow.png">
			</div>
		</div>
		<?php endif ?>
		<div class="flex-center align-center w500px <?php if(!$resultData) echo "text-center"; ?>">
			<div class="flex-column flex-1 gap-24px <?php if(!$resultData) echo "align-center";?>">
				<h2 class="subtitle <?php if(!$resultData) echo "flex-center"; else echo "flex-left"; ?>">Spune-ne părerea ta!</h2>
				<p class="size18px <?php if(!$resultData) echo "flex-center"; else echo "flex-left"; ?> w80per">
					Ne interesează părerea ta pentru a putea îmbunătăți orice aspect al site-ului. Descoperă părerile și experiențele utilizatorilor noștri. De la calitatea manualelor la ușurința de utilizare, ai acces la recenzii obiective care te vor ajuta să iei decizia potrivită pentru nevoile tale.
				</p>
				<div class="<?php if(!$resultData) echo "flex-center"; else echo "flex-left"; ?>">
					<a href="feedback.php" class="simple-button">Adauga recenzie</a>
				</div>
			</div>
		</div>
	</section>

	<?php include 'includes/footer.php' ?>

</body>

	<script src="javascript/review.js"></script>
	<?php include 'includes/utility.php' ?>

</html>