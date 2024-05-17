<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';
?>

<?php 
	$sql = "SELECT * FROM manuals WHERE request = 0";
	$resultData = mysqli_query($connection, $sql);
	$resultData = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
	$manualsNumber = 0;
	foreach ($resultData as $manual)
		$manualsNumber++;

	setcookie('search', 0, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);
	setcookie('resultErr', 0, time()-10, '/', $_SERVER['HTTP_HOST'], true, true);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manuals</title>
</head>
<body class="body">

	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<?php if($manualsNumber > 0): ?>
		<section class="flex-center align-center top-bottom-5per m-top-65px">
				<form action="searchSystemProcess/manualSearch.php" method="POST" class="w600px h50px flex-space-between search-bar-wrapper align-center">
					<div>
						<input type="text" name="userSearch" class="search-bar-text-input" placeholder="Caută manual" value="<?php if(isset($_COOKIE['search'])) echo $_COOKIE['search']?>">
						<input type="submit" name="search" value="" class="no-display search-form-submit">
					</div>
					<div class="img9 search-button pointer">
						<img src="images/generalElements/search.png">
					</div>
				</form>
		</section>
	<?php endif ?>

	<section class="flex-center align-center <?php if(!isset($_COOKIE['resultErr'])) echo 'top-4per' ?>">
		<?php if($manualsNumber > 0 && !isset($_COOKIE['search'])): ?>
			<div class="flex-column w100per">
				<div class="flat-line w100per blue-bg"></div>
				<div class="w100per blue-bg manuals-grid-container">
					<?php foreach ($resultData as $manual): ?>
						<?php 
							$printerNameConc = str_replace(' ', '', $manual['printerName']);
							$printerNameConc = str_replace('.', '_', $printerNameConc);
						?>
						<div class="printer-card h100per full-box white-bg flex-center align-center" id="<?php echo $printerNameConc ?>">
							<div class="flex-column align-center top-bottom-5per">
								<img src="manuals/<?php echo $printerNameConc?>/<?php echo $printerNameConc."Photo"?>">
								<h2 class="blue size20px text-center"><?php echo $manual['printerName'] ?></h2>
							</div>
							<?php if(isset($_COOKIE['connection']) && $_SESSION['admin'] >= 1): ?>
								<div class="img16 m-right-20px remove-button">
									<img src="images/generalElements/minus.png" class="pointer rmv-manual">
									<form method = 'POST' class="no-display">
										<button type="submit" name="delete" value ="<?php echo $manual['id'] ?>" class = "manual-delete-id"></button> 
									</form>		
								</div>
							<?php endif ?>
							<?php if($manual['ratings'] != 0): ?>
								<div class="rating flex-center align-center gap-10px">
									<div class="img26">
										<img src="images/generalElements/star.png">
									</div>
									<h2 class="size15px normal italic"><?php echo number_format($manual['overallRating'], 1); ?></h2>
								</div>
							<?php else: ?>
								<div class="rating">
									<h2 class="size15px normal italic">Fără recenzii</h2>
								</div>
							<?php endif ?>
								<?php 
								        $printerName = $manual['printerName'];
										$saved = 0;
									if (isset($_COOKIE['connection'])) {
										$username = $_SESSION['username'];
										$sql = "SELECT * FROM ".$username." WHERE printerName = '$printerName'";
										$savedData = mysqli_query($savedConnection, $sql);
										$savedData = mysqli_fetch_assoc($savedData);
										if ($savedData) 
											$saved = 1;
									}
								?>
								<div class="saved-icon pointer">
									<div class="img29">
										<img class = "<?php if($saved) echo "no-display"?> empty-save" id = "<?php echo $manual['printerName']; ?>" src="images/generalElements/emptySave.png">
										<img class = "<?php if(!$saved) echo "no-display"?> filled-save" id = "<?php echo $manual['printerName']; ?>" src="images/generalElements/filledSave.png">
									</div>
								</div>
						</div>
					<?php endforeach ?>
					<?php for ($i=$manualsNumber; $i%4 != 0 ; $i++):?>
						<div class="empty-printer-card white-bg h100per filler"></div>
					<?php endfor ?>
					<?php for ($i=1; $i<=4; $i++): ?>
						<div class="empty-printer-card top-bottom-5per h23px white-bg small-filler"></div>
					<?php endfor ?>
				</div>
			</div>
		<?php elseif ($manualsNumber == 0): ?>
			<div class="flex-center align-center w75per top-bottom-222px gap-40px">
				<div class="flex-column gap-40px">
					<div class="flex-column gap-15px">
						<h2 class="size26px normal">Momentan această secțiune este goală.</h2>
						<h2 class="size26px normal">Fii primul care adaugă un manual!</h2>
					</div>
					<div class="flex-left">
						<a href="submitManual.php" class="simple-button">Adaugă manual</a>
					</div>
				</div>
				<div class="img13">
					<img src="images/generalElements/emptyPageImg.png">
				</div>
			</div>
		<?php elseif(isset($_COOKIE['search']) && !isset($_COOKIE['resultErr'])): ?>
			<div class="flex-column w100per">
				<div class="flat-line w100per blue-bg"></div>
				<div class="w100per blue-bg manuals-grid-container">
					<?php $manualsNumber = 0; ?>
					<?php foreach ($_SESSION['manualResults'] as $manual): ?>
						<?php 
							$manualsNumber++;
							$printerNameConc = str_replace(' ', '', $manual['printerName']);
						?>
						<div class="printer-card" id="<?php echo $printerNameConc ?>">
							<div class="flex-column white-bg align-center top-bottom-5per">
								<img src="manuals/<?php echo $printerNameConc?>/<?php echo $printerNameConc."Photo"?>">
								<h2 class="blue size20px"><?php echo $manual['printerName'] ?></h2>
							</div>
							<?php if(isset($_COOKIE['connection']) && $_SESSION['admin'] >= 1): ?>
								<div class="img16 m-right-20px remove-button">
									<img src="images/generalElements/minus.png" class="pointer rmv-manual">
									<form method = 'POST' class="no-display">
										<button type="submit" name="delete" value ="<?php echo $manual['id'] ?> " class = "manual-delete-id"></button> 
									</form>		
								</div>
							<?php endif ?>
							<?php if($manual['ratings'] != 0): ?>
								<div class="rating flex-center align-center gap-10px">
									<div class="img26">
										<img src="images/generalElements/star.png">
									</div>
									<h2 class="size15px normal italic"><?php echo number_format($manual['overallRating'], 1); ?></h2>
								</div>
							<?php else: ?>
								<div class="rating">
									<h2 class="size15px normal italic">Fără recenzii</h2>
								</div>
							<?php endif ?>
							<?php 
								        $printerName = $manual['printerName'];
										$saved = 0;
									if (isset($_COOKIE['connection'])) {
										$username = $_SESSION['username'];
										$sql = "SELECT * FROM ".$username." WHERE printerName = '$printerName'";
										$savedData = mysqli_query($savedConnection, $sql);
										$savedData = mysqli_fetch_assoc($savedData);
										if ($savedData) 
											$saved = 1;
									}
								?>
								<div class="saved-icon pointer">
									<div class="img29">
										<img class = "<?php if($saved) echo "no-display"?> empty-save" id = "<?php echo $manual['printerName']; ?>" src="images/generalElements/emptySave.png">
										<img class = "<?php if(!$saved) echo "no-display"?> filled-save" id = "<?php echo $manual['printerName']; ?>" src="images/generalElements/filledSave.png">
									</div>
								</div>
						</div>
					<?php endforeach ?>
					<?php for ($i=$manualsNumber; $i%4 != 0 ; $i++):?>
						<div class="empty-printer-card white-bg h100per filler"></div>
					<?php endfor ?>
					<?php for ($i=1; $i<=4; $i++): ?>
						<div class="empty-printer-card top-bottom-5per h23px white-bg small-filler"></div>
					<?php endfor ?>
				</div>
			</div>
		<?php elseif (isset($_COOKIE['resultErr'])): ?>
			<div class="flex-center align-center w75per bottom-200px gap-40px">
				<div class="flex-column gap-40px">
					<div class="flex-column gap-15px">
						<h2 class="size26px normal">Momentan acest manual nu este disponibil. :(</h2>
						<div>
							<h2 class="size26px normal inline">Poți adăuga chiar tu manualul</h2> <a href="submitManual.php" class="size26px blue inline">aici</a><h2 class="normal size26px inline">.</h2>
						</div>
					</div>
				</div>
				<div class="img25">
					<img src="images/generalElements/noResult.png">
				</div>
			</div>
		<?php endif ?>
	</section>

	<?php if($manualsNumber > 0 && !isset($_COOKIE['resultErr'])): ?>
		<section class="add-manual flex-center">
			<div class="flex-center align-center gap-15px white-bg w240px h50px r30px basic-shadow pointer">
				<h2 class="blue size20px normal">Adaugă manual</h2>
				<div class="img10">
					<img src="images/generalElements/circledPlus.png">
				</div>
			</div>
		</section>
	<?php endif ?>

	<div class="pop-up-background w100per h100per no-display">
		<div class="pop-up basic-shadow-grey flex-center align-center">
		<div class="flex-column gap-40px">
			<h2 class="normal size20px">Ești sigur că vrei să ștergi aceast manual?</h2>
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
	<script src="javascript/confirmation.js"></script>
	<script src="javascript/save.js"></script>
	<script src="javascript/showPrinter.js"></script>
	<?php include 'includes/utility.php' ?>

</html>