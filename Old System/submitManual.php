<?php 
	include 'includes/stylesIncludes.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add Manual</title>
	</head>
	<body class="flex-column m-top-40px gap-40px">
		<div class="w120px flex-center">	
			<div class="return-manuals pointer">
				<img src="images/generalElements/leftArrow.png">
			</div>
		</div>
		<div class="flex-column align-center gap-60px">
			<div>
				<h1 class="blue size30px">Adaugă manual</h1>
			</div>
			<form method="POST" enctype="multipart/form-data" class="flex-column align-center gap-60px">
				<div class="flex-column gap-20px">
					<div class="flex-column gap-5px h72px">
						<input type="text" name="printerName" placeholder="Nume imprimantă" class="wide-text-input" id="printerName">
						<p class="form-error" id="printerName-error"></p>
					</div>
					<div class="flex-column gap-5px h118px">
						<textarea type="text" name="description" placeholder="Descriere" class="description-text-input" id="description"></textarea>
						<p class="form-error" id="description-error"></p>
					</div>
					<div class="flex-column gap-5px h72px">
						<input type="text" name="video" placeholder="Link setup video" class="wide-text-input" id="video">
						<p class="form-error" id="video-error"></p>
					</div>
					<div class="flex-column gap-15px">
						<h2 class="size18px normal">Adaugă manualul imprimantei :</h2>
					<div class="flex-column gap-5px h72px">
						<div class="wide-text-input flex-left align-center full-box gap-15px">
							<label for="document">
								<div class="img12">	
									<img src="images/generalElements/uploadIcon.png">
								</div>
							</label>
							<input type="file" name="document" accept=".pdf" class="w100per" id="document">
						</div>
						<p class="form-error" id="document-error"></p>
					</div>
					</div>
					<div class="flex-column gap-15px">
						<h2 class="size18px normal">Adaugă poza imprimantei :</h2>
					<div class="flex-column gap-5px h72px">
						<div class="wide-text-input flex-left align-center full-box gap-15px">
							<label for="image">
								<div class="img12">	
									<img src="images/generalElements/uploadIcon.png">
								</div>
							</label>
							<input type="file" name="image" accept=".png, .jpg" class="w100per" id="image">
						</div>	
						<p class="form-error" id="image-error"></p>
					</div>
				</div>
				</div>
				<div>
					<input class = "simple-button pointer" type="submit" name="manualAdd" value="Adaugă" id="submit">
				</div>
			</div>
		</form>

		<?php if(isset($_COOKIE['connection']) && $_SESSION['admin'] == 0): ?>
		<div class="pop-up-background confirmation w100per h100per no-display">
			<div class="pop-up basic-shadow-grey flex-center align-center">
				<div class="flex-column gap-40px w80per">
					<h2 class="normal size20px text-center">Manualul tău a fost trimis către un admin și așteaptă aprobarea acestuia!</h2>
					<div class="flex-center align-center gap-40px">
						<a class="continue-button pointer">Continuă</a>
					</div>
				</div>
			</div>
		</div>
		<?php endif ?>

	</body>

	<script src="javascript/return.js"></script>
	<script src="javascript/submitManual.js"></script>

</html>

