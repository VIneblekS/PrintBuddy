<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';

	$manualId = '159';
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
	<title>Prusa MK4</title>
</head>
<body class="flex-column m-top-40px gap-20px">
	<div class="w120px flex-center">	
		<div class="return-manuals pointer">
			<img src="../images/generalElements/leftArrow.png">
		</div>
	</div>
	<div class="flex-column align-center gap-80px">
		<div>
			<h1 class="blue size30px">Prusa MK4</h1>
		</div>
		<div class="w1200px flex-space-between align-center">
			<div class="img20">
				<img src="PrusaMK4/PrusaMK4Photo">
			</div>
			<div class="flex-column gap-24px w45per">
				<div class="w100per full-border r10px">
					<div class="flex-column gap-15px full-5per">
						<h2 class="blue size26px">Descriere</h2>
						<p class="normal size20px">Prusa MK4 poate printa pe o suprafata de 250 x 210 x 220 mm si patul de printare se poate incalzi pana la 120 &deg;C / 248 &deg;F . Datorită celor două șuruburi cu eliberare rapidă de pe partea laterală a corpului Nextruder, care țin duza &icirc;n poziție, puteți schimba duzele mai ușor ca niciodată. Aceasta imprimanta folosește duze speciale cu un ghidaj de filament integral din metal (fără tuburi PTFE), ceea ce &icirc;mbunătățește fiabilitatea generală a imprimantei. Imprimanta vine cu piese din plastic reproiectate, mai robuste și noi motoare precise de 0,9&deg; pe axele X și Y care ajută la eliminarea artefactelor fine verticale de pe imprimări. &Icirc;n plus, există tije mai groase de 10 mm pe axa Z. Rezultatul este că imprimările arată mai bine ca niciodată și chiar și imprimarea cu filamente &bdquo;problematice&rdquo; precum Flex este o nimica toata.</p>
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
						<button type="submit" name="rate" value="159" class="rate-button"></button>
					</form>
				</div>
			</div>
		</div>
		<div class="flex-column align-center gap-200px">	
			<div class="w1200px flex-column gap-80px align-center">
				<h2 class="blue size30px">Setup</h2>
				<div class="video-container w100per">
					<iframe width = "100%" height = "100%" src="https://www.youtube.com/embed/xMRggeM9KQc&amp;t=3s" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</div>
			</div>
			<div class="w1200px flex-column gap-80px align-center bottom-150px">
				<h2 class="blue size30px">Manual de utilizare</h2>
				<div class="pdf-container w100per">
					<iframe width = "100%" height = "100%" src="PrusaMK4/PrusaMK4Manual"></iframe>
				</div>
			</div>
		</div>
	</div>
</body>

	<script src="../javascript/return.js"></script>
	<script src="../javascript/rate.js"></script>

</html>