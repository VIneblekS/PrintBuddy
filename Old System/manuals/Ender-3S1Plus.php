<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$manualId = '174';
	if (isset($_COOKIE['connection'])) {
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM rating".$manualId." WHERE username = '$username'";
		$resultData = mysqli_query($ratingsConnection, $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		if(!$resultData)
			$userRating = 0;
		else
			$userRating = $resultData['rating'];
	}

?>

<link rel="stylesheet" type="text/css" href="../styles/navbarStyles.css">
<link rel="stylesheet" type="text/css" href="../styles/flexboxClasses.css">
<link rel="stylesheet" type="text/css" href="../styles/sidebarStyles.css">
<link rel="stylesheet" type="text/css" href="../styles/shapesImagesStyles.css">
<link rel="stylesheet" type="text/css" href="../styles/effectsStyles.css">
<link rel="stylesheet" type="text/css" href="../styles/marginPaddingStyles.css">
<link rel="stylesheet" type="text/css" href="../styles/widthHeightStyles.css">
<link rel="stylesheet" type="text/css" href="../styles/generalStyles.css">
<link rel="stylesheet" type="text/css" href="../styles/textStyles.css">

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ender-3 S1 Plus</title>
</head>
<body class="flex-column m-top-40px gap-20px">
	<div class="w120px flex-center">	
		<div class="return-manuals pointer">
			<img src="../images/generalElements/leftArrow.png">
		</div>
	</div>
	<div class="flex-column align-center gap-80px">
		<div>
			<h1 class="blue size30px">Ender-3 S1 Plus</h1>
		</div>
		<div class="w1200px flex-space-between align-center">
			<div class="img20">
				<img src="Ender-3S1Plus/Ender-3S1PlusPhoto">
			</div>
			<div class="flex-column gap-24px w45per">
				<div class="w100per full-border r10px">
					<div class="flex-column gap-15px full-5per">
						<h2 class="blue size26px">Descriere</h2>
						<p class="normal size20px">Extruder direct nou-nouț, ușor și puternic, care asigură o alimentare lină și o imprimare perfectă chiar și cu filamente flexibile. Cu un ecran tactil de 4,3 inchi, este ușor să accesezi toate funcțiile. Funcția de previzualizare a modelului permite utilizatorilor să știe dacă fișierul G-code este sunet dintr-o privire. Setările PID sunt utile pentru controlul avansat al temperaturii. &Icirc;n plus, ecranul se va estompa după ce a fost inactiv timp de 5 minute. Ender-3 S1 Plus folosește nivelarea automată CR Touch &icirc;n 16 puncte pentru a compensa cu precizie &icirc;nclinarea patului, astfel &icirc;nc&acirc;t primul strat să fie &icirc;ntotdeauna perfect. Pentru un control mai bun al nivelării, puteți edita și datele rețelei de nivelare după cum doriți. Asamblare rapidă si ușor de manevrat in doar 6 pasi.</p>
					</div>
				</div>
				<div class="flex-column gap-10px">
					<h1 class="size22px blue">Evaluează manualul!</h1>
					<div class="flex-left align-center gap-1px">
						<div class="img27 <?php if(!($userRating >= 1)) echo 'no-display'?>" id="r">
							<img src="../images/generalElements/star.png">
						</div>
						<div class="img27 <?php if($userRating >= 1) echo 'no-display'?>" id="e">
							<img src="../images/generalElements/hollowStar.png">
						</div>
						<div class="img27 <?php if(!($userRating >= 2)) echo 'no-display'?>" id="r">
							<img src="../images/generalElements/star.png">
						</div>
						<div class="img27 <?php if($userRating >= 2) echo 'no-display'?>" id="e">
							<img src="../images/generalElements/hollowStar.png">
						</div>
						<div class="img27 <?php if(!($userRating >= 3)) echo 'no-display'?>" id="r">
							<img src="../images/generalElements/star.png">
						</div>
						<div class="img27 <?php if($userRating >= 3) echo 'no-display'?>" id="e">
							<img src="../images/generalElements/hollowStar.png">
						</div>
						<div class="img27 <?php if(!($userRating >= 4)) echo 'no-display'?>" id="r">
							<img src="../images/generalElements/star.png">
						</div>
						<div class="img27 <?php if($userRating >= 4) echo 'no-display'?>" id="e">
							<img src="../images/generalElements/hollowStar.png">
						</div>
						<div class="img27 <?php if(!($userRating >= 5)) echo 'no-display'?>" id="r">
							<img src="../images/generalElements/star.png">
						</div>
						<div class="img27 <?php if($userRating >= 5) echo 'no-display'?>" id="e">
							<img src="../images/generalElements/hollowStar.png">
						</div>
					</div>
					<form action = "../ratingSystemProcess/rating.php" method = 'POST' class="no-display">
						<button type="submit" name="rate" value="174" class="rate-button"></button>
					</form>
				</div>
			</div>
		</div>
		<div class="flex-column align-center gap-200px">	
			<div class="w1200px flex-column gap-80px align-center">
				<h2 class="blue size30px">Setup</h2>
				<div class="video-container w100per">
					<iframe width = "100%" height = "100%" src="https://www.youtube.com/embed/fhr_MC38nog" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</div>
			</div>
			<div class="w1200px flex-column gap-80px align-center bottom-150px">
				<h2 class="blue size30px">Manual de utilizare</h2>
				<div class="pdf-container w100per">
					<iframe width = "100%" height = "100%" src="Ender-3S1Plus/Ender-3S1PlusManual"></iframe>
				</div>
			</div>
		</div>
	</div>
</body>

	<script src="../javascript/return.js"></script>
	<script src="../javascript/rate.js"></script>

</html>