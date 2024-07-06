<?php 	
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';

	if (!isset($_COOKIE['connection'])) {
		header('Location: index.php');
		exit;
	}
?>

<?php
	$sql = "SELECT * FROM ".$_SESSION['username'];
	$resultData = mysqli_query($savedConnection, $sql);
	$resultData = mysqli_fetch_all($resultData, MYSQLI_ASSOC);

	foreach($resultData as $save) {
		$printerName = $save['printerName'];
		$sql = "SELECT * FROM manuals WHERE printerName = '$printerName'";
		$manualExists = mysqli_query($connection, $sql);
		$manualExists = mysqli_fetch_assoc($manualExists);
		if (!$manualExists) {
			$sql = "DELETE FROM ".$_SESSION['username']." WHERE printerName = '$printerName'";
			mysqli_query($savedConnection, $sql);
		}
	}

	$sql = "SELECT * FROM ".$_SESSION['username'];
	$resultData = mysqli_query($savedConnection, $sql);
	$resultData = mysqli_fetch_all($resultData, MYSQLI_ASSOC);

	foreach($resultData as $index => $search)
		$dates[$index] = $search['id'];

	if ($resultData)
		array_multisort($dates, SORT_DESC, $resultData);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search History</title>
</head>
<body class="flex-center">

	<?php include 'includes/leftMenu.php'; ?>

	<section class="flex-center align-center top-bottom-5per m-top-65px no-display">
		<form action="searchSystemProcess/manualSearch.php" method="POST" class="w600px h50px flex-space-between search-bar-wrapper align-center">
				<input type="text" name="userSearch" class="search-bar-text-input userSearch" placeholder="Caută manual">
				<input type="submit" name="search" value="" class="no-display search-form-submit search">
		</form>
	</section>

	<section class="w100per left-150px top-bottom-60px">
		<div class="flex-column gap-100px">
			<h1 class="size30px blue">Salvate</h1>
			<?php if($resultData): ?>
					<div class="blue-bg faq-grid-container w85per">
						<?php foreach ($resultData as $manual):?>
							<?php $printerNameConc = str_replace(' ', '', $manual['printerName']); ?>
							<div class="white-bg manual-save">
								<div class="flex-space-between align-center">
									<div class="flex-left top-bottom-20px gap-20px left-20px align-center printer-container pointer printer-card" id="<?php echo $printerNameConc ?>">
										<div class="img22 show-printer">
											<img src="manuals/<?php echo $printerNameConc?>/<?php echo $printerNameConc."Photo"?>">
										</div>
										<h2 class="blue size20px"><?php echo $manual['printerName'] ?></h2>
									</div>
									<div class="m-right-20px">
										<div class="img30 pointer delete-save" id="<?php echo $manual['printerName']; ?>">
											<img src="images/generalElements/unsave.png">
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php else: ?>
					<div class="w90per flex-left gap-60px align-center">
					<div class="img23">
						<img src="images/menu/emptyForNow.png">
					</div>
					<div class="w600px flex-column gap-24px right-40px">
						<h2 class="normal size22px">Momentan nu ai salvat niciun manual. :(</h2>
						<div>
							<h2 class="normal size22px inline">Pentru a te bucura de toate facilitățile site-ului nostru accesează</h2> <a href="manuals.php" class="normal size22px blue inline">Manuale</a><h2 class="normal size22px inline">.</h2>
						</div>
					</div>
				</div>
				<?php endif ?>
		</div>
	</section>

</body>

	<script src="javascript/links.js"></script>
	<script src="javascript/unsave.js"></script>
	<script src="javascript/return.js"></script>
	<script src="javascript/deleteSearch.js"></script>
	<script src="javascript/redoSearch.js"></script>
	<script src="javascript/showPrinter.js"></script>
	<?php if (isset($_SESSION['admin'])): ?>
		<script src = "javascript/admin.js"></script>
	<?php endif ?>
	
</html>