<?php 	
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';

	if (!isset($_COOKIE['connection']) || $_SESSION['admin'] == 0) {
		header('Location: index.php');
		exit;
	}
?>

<?php 
	$sql = "SELECT * FROM faq WHERE request = 1";
	$faqResultData = mysqli_query($connection, $sql);
	$faqResultData = mysqli_fetch_all($faqResultData, MYSQLI_ASSOC);
	$faqNumber = 0;
	foreach ($faqResultData as $faq)
		$faqNumber++;

	$sql = "SELECT * FROM manuals WHERE request = 1";
	$manualResultData = mysqli_query($connection, $sql);
	$manualResultData = mysqli_fetch_all($manualResultData, MYSQLI_ASSOC);
	$manualNumber = 0;
	foreach ($manualResultData as $manual)
		$manualNumber++;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Panel</title>
</head>
<body class="flex-center">

	<?php include 'includes/leftMenu.php'; ?>

	<section class="w100per left-150px top-bottom-60px">
		<div class="flex-column gap-80px">
			<h1 class="size30px blue">Panou administrator</h1>
			<div class="w75per flex-column gap-40px">
				<h1 class="blue size22px">Întrebări propuse</h1>
				<?php if($faqNumber > 0): ?>
					<div class="blue-bg faq-grid-container">
						<?php foreach ($faqResultData as $faq):?>
							<div class="white-bg faq-req">
								<div class="flex-space-between align-center">
									<div class="flex-left top-bottom-40px gap-20px left-40px align-center">
										<div class="img11 show-answer pointer">
											<img src="images/generalElements/plus.png">
										</div>
										<h2 class="normal size20px"><?php echo $faq['question'] ?></h2>
									</div>
									<div class="m-right-20px">
										<div class="flex-center align-center gap-40px">
											<div class="img21 pointer accept-faq-button">
												<img src="images/generalElements/tick.png">
											</div>
											<div class="img19 pointer deny-faq-button">
												<img src="images/generalElements/cross.png">
											</div>
										</div>
										<form method = 'POST' class="no-display">
											<button type="submit" name="deny" value ="<?php echo $faq['id'] ?>" class = "faq-deny-id"></button>
										</form>	
										<form method = 'POST' class="no-display">
											<button type="submit" name="approve" value ="<?php echo $faq['id'] ?>" class = "faq-accept-id"></button>
										</form>
									</div>
								</div>
								<div class="answer white-bg left-87px bottom-40px">
									<p class="normal size18px"><?php echo $faq['answer'] ?></p>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php else: ?>
					<div class="flex-left align-center gap-40px">
						<div class="img24">
							<img src="images/menu/faqNoRequest.png">
						</div>
						<h2 class="w300px size22px normal">Momentan niciun utilizator nu a propus întrebări.</h2>
					</div>
				<?php endif ?>
			</div>
			<div class="w75per flex-column gap-40px">
				<h1 class="blue size22px">Manuale propuse</h1>
				<?php if($manualNumber > 0): ?>
					<div class="blue-bg faq-grid-container">
						<?php foreach ($manualResultData as $manual):?>
							<?php $printerNameConc = str_replace(' ', '', $manual['printerName']); ?>
							<div class="white-bg manual-req">
								<div class="flex-space-between align-center">
									<div class="flex-left top-bottom-20px gap-20px left-20px align-center printer-container pointer printer-card" id="<?php echo $printerNameConc ?>">
										<div class="img22 show-printer">
											<img src="manuals/<?php echo $printerNameConc?>/<?php echo $printerNameConc."Photo"?>">
										</div>
										<h2 class="blue size20px"><?php echo $manual['printerName'] ?></h2>
									</div>
									<div class="m-right-20px">
										<div class="flex-center align-center gap-40px">
											<div class="img21 pointer accept-manual-button">
												<img src="images/generalElements/tick.png">
											</div>
											<div class="img19 pointer deny-manual-button">
												<img src="images/generalElements/cross.png">
											</div>
										</div>
										<form method = 'POST' class="no-display">
											<button type="submit" name="deny" value ="<?php echo $manual['id'] ?>" class = "manual-deny-id"></button>
										</form>	
										<form method = 'POST' class="no-display">
											<button type="submit" name="approve" value ="<?php echo $manual['id'] ?>" class = "manual-accept-id"></button>
										</form>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				<?php else: ?>
					<div class="flex-left align-center gap-40px">
						<div class="img24">
							<img src="images/menu/manualsNoRequest.png">
						</div>
						<h2 class="w300px size22px normal">Momentan niciun utilizator nu a propus manuale.</h2>
					</div>
				<?php endif ?>
			</div>
		</div>
	</section>

</body>
	
	<script src="javascript/links.js"></script>
	<script src="javascript/return.js"></script>
	<script src="javascript/showAnswer.js"></script>
	<script src="javascript/showPrinter.js"></script>
	<script src="javascript/admin.js"></script>
	
	
</html>