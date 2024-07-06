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
	$resultData = mysqli_query($historyConnection, $sql);
	$resultData = mysqli_fetch_all($resultData, MYSQLI_ASSOC);

	foreach($resultData as $index => $search)
		$dates[$index] = $search['searchTime'];

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
			<h1 class="size30px blue">Istoricul căutarilor</h1>
			<?php if($resultData): ?>
				<div class="w75per blue-bg faq-grid-container">
					<?php foreach($resultData as $history): ?>
						<div class="flex-space-between white-bg align-center top-bottom-20px" id="previous-search">
							<div class="flex-left align-center gap-24px previous-search-button pointer">
								<div class="search-icon-container circle-40px light-blue-bg">
									<div class="search-icon">
										<img src="images/generalElements/search.png">
									</div>
								</div>
								<h2 class="size20px blue previous-search"><?php echo $history['search'] ?></h2>
							</div>
							<div class="flex-center align-center gap-24px">
								<h2 class="normal size16px"><?php
									$searchTime = strtotime($history['searchTime']);
								 	if (date('Y-m-d', $searchTime) == date('Y-m-d', time()))
							 			$searchTime = date('H:i', $searchTime);
							 		elseif (date('W', $searchTime) == date('W', time()))
							 			$searchTime = date('l', $searchTime);
							 		elseif (date('Y', $searchTime) == date('Y', time()))
							 			$searchTime = date('m-d', $searchTime);
							 		else
							 			$searchTime = date('Y-m', $searchTime);
									echo $searchTime; 
								?></h2>
								<div class="img19 pointer" id="delete-button">
									<img src="images/generalElements/cross.png">
									<form method = 'POST' class="no-display">
										<button type="submit" name="delete" value ="<?php echo $history['id'] ?>" id = "delete"></button> 
									</form>
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
						<h2 class="normal size22px">Momentan istoricul de căutare este gol. :(</h2>
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
	<script src="javascript/return.js"></script>
	<script src="javascript/deleteSearch.js"></script>
	<script src="javascript/redoSearch.js"></script>
	<?php if (isset($_SESSION['admin'])): ?>
		<script src = "javascript/admin.js"></script>
	<?php endif ?>
	
</html>