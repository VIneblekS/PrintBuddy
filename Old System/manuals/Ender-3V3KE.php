<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$manualId = '164';
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
	<title>Ender-3 V3 KE</title>
</head>
<body class="flex-column m-top-40px gap-20px">
	<div class="w120px flex-center">	
		<div class="return-manuals pointer">
			<img src="../images/generalElements/leftArrow.png">
		</div>
	</div>
	<div class="flex-column align-center gap-80px">
		<div>
			<h1 class="blue size30px">Ender-3 V3 KE</h1>
		</div>
		<div class="w1200px flex-space-between align-center">
			<div class="img20">
				<img src="Ender-3V3KE/Ender-3V3KEPhoto">
			</div>
			<div class="flex-column gap-24px w45per">
				<div class="w100per full-border r10px">
					<div class="flex-column gap-15px full-5per">
						<h2 class="blue size26px">Descriere</h2>
						<p class="normal size20px">Fiecare aspect al imprimantei dvs. 3D poate fi controlat de pe un computer (Creality Print)
sau un telefon (Creality Cloud APP) prin WiFi. Cu mai multe imprimante online, le puteți gestiona eficient pe toate in acelasi timp. Are viteza maxima de 500mm/s* si acceleratia maxima de 8000mm/s&sup2;* . Șina liniară precisă de pe axa X are un glisier care conține rulmenți cu bile, făc&acirc;nd fiecare mișcare precisă, constantă și fără frecare. Ender-3 V3 KE poate gestiona filamente Hyper PLA, PETG, ABS, TPU(95A) și ASA.
Alegeți-l pe cel potrivit pentru a imprima orice articol, piesă sau produs zilnic doriți.
Ender-3 V3 KE imprimă mai rapid și mai bine cu Creality Hyper PLA.</p>
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
						<button type="submit" name="rate" value="164" class="rate-button"></button>
					</form>
				</div>
			</div>
		</div>
		<div class="flex-column align-center gap-200px">	
			<div class="w1200px flex-column gap-80px align-center">
				<h2 class="blue size30px">Setup</h2>
				<div class="video-container w100per">
					<iframe width = "100%" height = "100%" src="https://www.youtube.com/embed/ARWsROGIpgM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</div>
			</div>
			<div class="w1200px flex-column gap-80px align-center bottom-150px">
				<h2 class="blue size30px">Manual de utilizare</h2>
				<div class="pdf-container w100per">
					<iframe width = "100%" height = "100%" src="Ender-3V3KE/Ender-3V3KEManual"></iframe>
				</div>
			</div>
		</div>
	</div>
</body>

	<script src="../javascript/return.js"></script>
	<script src="../javascript/rate.js"></script>

</html>