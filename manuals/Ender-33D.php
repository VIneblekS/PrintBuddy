<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$manualId = '179';
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
	<title>Ender-3 3D</title>
</head>
<body class="flex-column m-top-40px gap-20px">
	<div class="w120px flex-center">	
		<div class="return-manuals pointer">
			<img src="../images/generalElements/leftArrow.png">
		</div>
	</div>
	<div class="flex-column align-center gap-80px">
		<div>
			<h1 class="blue size30px">Ender-3 3D</h1>
		</div>
		<div class="w1200px flex-space-between align-center">
			<div class="img20">
				<img src="Ender-33D/Ender-33DPhoto">
			</div>
			<div class="flex-column gap-24px w45per">
				<div class="w100per full-border r10px">
					<div class="flex-column gap-15px full-5per">
						<h2 class="blue size26px">Descriere</h2>
						<p class="normal size20px">Ender-3 adoptă un profil inovator &icirc;n V și un scripete pentru o funcționare stabilă, cu zgomot redus, rezistență la uzură și o durată de viață mai lungă. Patul de căldură poate atinge 100&ordm;C &icirc;n 5 minute, &icirc;ndeplinind perfect cerința de &icirc;naltă eficiență. Placa de construcție din sticlă de carborundum are o bună aderență la modelul imprimat și permite &icirc;ndepărtarea rapidă a imprimării. O piuliță de nivelare mare și ușor de utilizat este echipată pentru o nivelare eficientă. Cu dispozitivul de protecție a sursei de alimentare și funcția de reluare a imprimării, nu trebuie să vă faceți griji cu privire la &icirc;ntreruperea accidentală, evit&acirc;nd risipa de filamente.</p>
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
						<button type="submit" name="rate" value="179" class="rate-button"></button>
					</form>
				</div>
			</div>
		</div>
		<div class="flex-column align-center gap-200px">	
			<div class="w1200px flex-column gap-80px align-center">
				<h2 class="blue size30px">Setup</h2>
				<div class="video-container w100per">
					<iframe width = "100%" height = "100%" src="https://www.youtube.com/embed/dQ0q9zLygTY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</div>
			</div>
			<div class="w1200px flex-column gap-80px align-center bottom-150px">
				<h2 class="blue size30px">Manual de utilizare</h2>
				<div class="pdf-container w100per">
					<iframe width = "100%" height = "100%" src="Ender-33D/Ender-33DManual"></iframe>
				</div>
			</div>
		</div>
	</div>
</body>

	<script src="../javascript/return.js"></script>
	<script src="../javascript/rate.js"></script>

</html>