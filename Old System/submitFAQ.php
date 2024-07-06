<?php 
	include 'includes/stylesIncludes.php';
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Add FAQ</title>
	</head>
	<body class="flex-column m-top-40px gap-80px">
		<div class="w120px flex-center">	
			<div class="return-faq pointer">
				<img src="images/generalElements/leftArrow.png">
			</div>
		</div>
		<div class="flex-column align-center gap-80px">
			<div>
				<h1 class="blue size30px">Adaugă întrebare</h1>
			</div>
			<form method="POST" class="flex-column align-center gap-60px">
				<div class = "flex-column gap-20px">
					<div class="flex-column gap-5px h86px">
						<textarea type="text" name="question" placeholder="Întrebare" class="question-text-input" id="question"></textarea>
						<p class="form-error" id="question-error"></p>
					</div>
					<div class="flex-column gap-5px h214px">
						<textarea type="text" name="answer" placeholder="Răspuns" class="answer-text-input" id="answer"></textarea>
						<p class="form-error" id="answer-error"></p>
					</div>
				</div>
				<div>
					<input class = "simple-button pointer" type="submit" name="faqAdd" value="Adaugă" id="submit">
				</div>
			</form>
		</div>

		<?php if(isset($_COOKIE['connection']) && $_SESSION['admin'] == 0): ?>
		<div class="pop-up-background confirmation w100per h100per no-display">
			<div class="pop-up basic-shadow-grey flex-center align-center">
				<div class="flex-column gap-40px w80per">
					<h2 class="normal size20px text-center">Întrebarea ta a fost trimis către un admin și așteaptă aprobarea acestuia!</h2>
					<div class="flex-center align-center gap-40px">
						<a class="continue-button pointer">Continuă</a>
					</div>
				</div>
			</div>
		</div>
		<?php endif ?>

	</body>

	<script src="javascript/return.js"></script>
	<script src="javascript/submitFAQ.js"></script>

</html>

