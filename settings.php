<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';

	if (!isset($_COOKIE['connection'])) {
		header('Location: index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings</title>
</head>
<body class="flex-center">
	<?php include 'includes/leftMenu.php'; ?>

	<section class="w100per left-150px top-bottom-60px flex-left">
		<div class="flex-column gap-60px">
			<h2 class="size30px blue">Setări</h2>
			<div class="flex-column gap-40px">
				<form method="POST" class="flex-left align-center gap-40px" id="form">
					<div class="flex-column gap-5px h72px">
						<div class="flex-center align-center gap-40px">
							<div class="input-container">
								<input type="text" name="newLastName" class="basic-text-input locked form-input" value="<?php echo $_SESSION['lastName']; ?>">
								<div class="edit-icon pointer">
									<img src="images/generalElements/pencil.png">
								</div>
								<div class="label left-right-10px">
									<h2 class="normal size18px">Nume</h2>
								</div>
							</div>
							<div class="menu flex-center align-center gap-20px no-display">
								<input class = "simple-button pointer" type="submit" name="change" value="Schimbă">
								<a class="cancel-button pointer">Anulează</a>
							</div>
						</div>
						<p class="form-error input-error"></p>
					</div>
				</form>
				<form method="POST" class="flex-left align-center gap-40px" id="form">
					<div class="flex-column gap-5px h72px">
						<div class="flex-center align-center gap-40px">
							<div class="input-container">
								<input type="text" name="newFirstName" class="basic-text-input locked form-input" value="<?php echo $_SESSION['firstName']; ?>">
								<div class="edit-icon pointer">
									<img src="images/generalElements/pencil.png">
								</div>
								<div class="label left-right-10px">
									<h2 class="normal size18px">Prenume</h2>
								</div>
							</div>
							<div class="menu flex-center align-center gap-20px no-display">
								<input class = "simple-button pointer" type="submit" name="change" value="Schimbă">
								<a class="cancel-button pointer">Anulează</a>
							</div>
						</div>
						<p class="form-error input-error"></p>
					</div>
				</form>
				<form method="POST" class="flex-left align-center gap-40px" id="form">
					<div class="flex-column gap-5px h72px">
						<div class="flex-center align-center gap-40px">
							<div class="input-container">
								<input type="text" name="newEmail" class="basic-text-input locked form-input" value="<?php echo $_SESSION['email']; ?>">
								<div class="edit-icon pointer">
									<img src="images/generalElements/pencil.png">
								</div>
								<div class="label left-right-10px">
									<h2 class="normal size18px">Email</h2>
								</div>
							</div>
							<div class="menu flex-center align-center gap-20px no-display">
								<input class = "simple-button pointer" type="submit" name="change" value="Schimbă">
								<a class="cancel-button pointer">Anulează</a>
							</div>
						</div>
						<p class="form-error input-error"></p>
					</div>
				</form>
				<form method="POST" class="flex-left align-center gap-40px" id="form">
					<div class="flex-column gap-5px h72px">
						<div class="flex-center align-center gap-40px">
							<div class="input-container">
								<input type="text" name="newPassword" class="basic-text-input locked form-input" value="***************">
								<div class="edit-icon pointer">
									<img src="images/generalElements/pencil.png">
								</div>
								<div class="label left-right-10px">
									<h2 class="normal size18px">Parolă</h2>
								</div>
							</div>
							<div class="menu flex-center align-center gap-20px no-display">
								<input class = "simple-button pointer" type="submit" name="change" value="Schimbă">
								<a class="cancel-button pointer">Anulează</a>
							</div>
						</div>
						<p class="form-error input-error"></p>
					</div>
				</form>
			</div>
			<div class="flex-column gap-40px">
				<h2 class="size30px red">Șterge contul</h2>
				<form method="POST" class="flex-column gap-24px" id="form">
					<div class="flex-column gap-5px h86px">
						<div class="input-container">
							<input type="text" name="confirmation" class="basic-red-text-input form-input">
							<div class="label left-right-10px">
								<h2 class="normal size18px">Password</h2>
							</div>
						</div>
						<p class="size15px normal">Introdu-ți parola pentru a confirma ștergerea contului.</p>
						<p class="form-error input-error"></p>
					</div>
					<div class="flex-left">
						<input class = "simple-red-button pointer" type="submit" name="delete" value="Șterge">
					</div>
				</form>
			</div>
		</div>
	</section>

</body>

	<script src="javascript/links.js"></script>
	<script src="javascript/return.js"></script>
	<script src="javascript/settings.js"></script>
	<?php if (isset($_SESSION['admin'])): ?>
		<script src = "javascript/admin.js"></script>
	<?php endif ?>

</html>

