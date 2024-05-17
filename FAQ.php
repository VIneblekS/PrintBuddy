<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';
?>

<?php 
	$sql = "SELECT * FROM faq WHERE request = 0";
	$resultData = mysqli_query($connection, $sql);
	$resultData = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
	$faqNumber = 0;
	foreach ($resultData as $faq)
		$faqNumber++;

	setcookie('search', 0, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);
	setcookie('resultErr', 0, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FAQ</title>
</head>
<body class="body">
	
	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<?php if($faqNumber > 0): ?>
		<section class="flex-center align-center top-bottom-5per m-top-65px">
				<form action="searchSystemProcess/faqSearch.php" method="POST" class="w600px h50px flex-space-between search-bar-wrapper align-center">
					<div>
						<input type="text" name="userSearch" class="search-bar-text-input" placeholder="Caută o întrebare">
						<input type="submit" name="search" value="" class="no-display search-form-submit">
					</div>
					<div class="img9 search-button pointer">
						<img src="images/generalElements/search.png">
					</div>
				</form>
		</section>
	<?php endif ?>

	<div class="min-h405px">
	<section class="flex-center align-center <?php if(!isset($_COOKIE['resultErr'])) echo 'top-bottom-4per' ?>">
		<?php if($faqNumber > 0 && !isset($_COOKIE['search'])): ?>
			<div class="w70per blue-bg faq-grid-container">
				<?php foreach ($resultData as $faq):?>
					<div class="white-bg faq">
						<div class="flex-space-between align-center">
							<div class="flex-left top-bottom-40px gap-20px left-40px align-center">
								<div class="img11 show-answer pointer">
									<img src="images/generalElements/plus.png">
								</div>
								<h2 class="normal size20px"><?php echo $faq['question'] ?></h2>
							</div>
							<?php if(isset($_COOKIE['connection']) && $_SESSION['admin'] >= 1): ?>
								<div class="img16 m-right-20px">
									<img src="images/generalElements/minus.png" class="pointer rmv-faq">
									<form method = 'POST' class="no-display">
										<button type="submit" name="delete" value ="<?php echo $faq['id'] ?>" class = "faq-delete-id"></button> 
									</form>		
								</div>
							<?php endif ?>
						</div>
						<div class="answer white-bg left-87px bottom-40px">
							<p class="normal size18px"><?php echo $faq['answer'] ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		<?php elseif ($faqNumber == 0): ?>
			<div class="flex-center align-center w75per top-bottom-222px gap-40px">
				<div class="flex-column gap-40px">
					<div class="flex-column gap-15px">
						<h2 class="size26px normal">Momentan această secțiune este goală.</h2>
						<h2 class="size26px normal">Fii primul care adaugă o întrebare!</h2>
					</div>
					<div class="flex-left">
						<a href="submitFAQ.php" class="simple-button">Adaugă o întrebare</a>
					</div>
				</div>
				<div class="img13">
					<img src="images/generalElements/emptyPageImg.png">
				</div>
			</div>
		<?php elseif (isset($_COOKIE['search']) && !isset($_COOKIE['resultErr'])): ?>
			<div class="w70per blue-bg faq-grid-container">
				<?php foreach ($_SESSION['faqResults'] as $faq):?>
					<div class="white-bg faq">
						<div class="flex-space-between align-center">
							<div class="flex-left top-bottom-40px gap-20px left-40px align-center">
								<div class="img11 show-answer pointer">
									<img src="images/generalElements/plus.png">
								</div>
								<h2 class="normal size20px"><?php echo $faq['question'] ?></h2>
							</div>
							<?php if(isset($_COOKIE['connection']) && $_SESSION['admin'] >= 1): ?>
								<div class="img16 m-right-20px">
									<img src="images/generalElements/minus.png" class="pointer rmv-faq">
									<form method = 'POST' class="no-display">
										<button type="submit" name="delete" value ="<?php echo $faq['id'] ?>" class = "faq-delete-id"></button> 
									</form>		
								</div>
							<?php endif ?>
						</div>
						<div class="answer white-bg left-87px bottom-40px">
							<p class="normal size18px"><?php echo $faq['answer'] ?></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		<?php elseif(isset($_COOKIE['resultErr'])):	 ?>
			<div class="flex-center align-center w75per bottom-200px gap-40px">
				<div class="flex-column gap-40px">
					<div class="flex-column gap-15px">
						<h2 class="size26px normal">Momentan acestă întrebare nu este disponibilă. :(</h2>
						<div>
							<h2 class="size26px normal inline">O poți adăuga chiar tu</h2> <a href="submitFAQ.php" class="size26px blue inline">aici</a><h2 class="normal size26px inline">.</h2>
						</div>
					</div>
				</div>
				<div class="img25">
					<img src="images/generalElements/noResult.png">
				</div>
			</div>
		<?php endif ?>
	</section>
	</div>

	<?php if($faqNumber > 0  && !isset($_COOKIE['resultErr'])): ?>
		<section class="add-faq flex-center">
			<div class="flex-center align-center gap-15px white-bg w240px h50px r30px basic-shadow pointer">
				<h2 class="blue size20px normal">Adaugă o întrebare</h2>
				<div class="img10">
					<img src="images/generalElements/circledPlus.png">
				</div>
			</div>
		</section>
	<?php endif ?>

	<div class="pop-up-background w100per h100per no-display">
		<div class="pop-up basic-shadow-grey flex-center align-center">
		<div class="flex-column gap-40px">
			<h2 class="normal size20px">Ești sigur că vrei să ștergi această întrebare?</h2>
			<div class="flex-center align-center gap-40px">
				<a class="cancel-button pointer">Anulează</a>
				<a class="delete-button pointer">Șterge</a>
			</div>
		</div>
		</div>
	</div>

	<?php include 'includes/footer.php' ?>

</body>

	<script src="javascript/search.js"></script>
	<script src="javascript/remove.js"></script>
	<script src="javascript/showAnswer.js"></script>
	<?php include 'includes/utility.php' ?>

</html>