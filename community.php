<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';

	if(isset($_COOKIE['connection']) && $_SESSION['community'] == 1){
		header('Location: unfinished.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Community</title>
</head>
<body>

	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<?php if(!isset($_COOKIE['connection']) || (isset($_COOKIE['connection']) && $_SESSION['community'] == 0)): ?>
		<section class="flex-center align-center m-top-65px">
			<div class="flex-center align-center w1200px top-bottom-180px gap-80px">
				<div class="img15">
					<img src="images/generalElements/communityImg.png">
				</div>
				<div class="flex-center align-center w100per blue-30T-bg r15px h370px">
					<div class="flex-column gap-40px w70per">
						<h2 class="size26px">Bun venit!</h2>
						<p class="size18px">Comunitatea noastră oferă un spațiu sigur și interactiv unde utilizatorii pot împărtăși idei, sfaturi și experiențe. Indiferent dacă sunt experimentați sau începători, membri se pot conecta și pot colabora pentru a învăța și a împărtăși pasiunea pentru această tehnologie inovatoare.</p>
						<div class="flex-left">
							<a href="userSystemProcess/communityJoin.php" class="simple-button">Alătură-te</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include 'includes/footer.php' ?>
	<?php endif ?>


</body>
	
	<?php include 'includes/utility.php' ?>

</html>