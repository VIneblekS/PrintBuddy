<?php 
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';

	if (!isset($_COOKIE['connection'])) {
		header('Location: http://localhost/InfoEdProject/index.php');
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
</head>
<body class="flex-center">
	<?php include 'includes/leftMenu.php'; ?>

	<section class="w100per left-150px top-bottom-60px flex-left">
		<div class="flex-column gap-100px">
			<h1 class="size30px blue">Profilul meu</h1>
			<div class="flex-center gap-40px align-center">
				<div class="pic-container">
					<div class="circle-100px profile-pic">
						<img class="circle-100px" src="images/generalElements/noUserPic.png">
					</div>
					<div class="change-pic circle-35px b2px white-bg full-box flex-center align-center">
						<div class="circle-25px">
							<img src="images/generalElements/camera.png">
						</div>
					</div>
				</div>
				<div class="flex-column gap-5px">
					<h2 class="size20px normal m-left-25px"><?php echo $_SESSION['firstName']; echo " "; echo $_SESSION['lastName']; ?></h2>
					<div class="flat-line blue-90T-bg w300px"></div>
					<h2 class="size16px normal m-left-25px"><?php echo $_SESSION['username'] ?> </h2>
				</div>
			</div>
			<div class="flex-column gap-40px">
				<div class="flex-column gap-10px">
					<div class="flex-center align-center gap-10px w300px">
						<div class="flat-line blue-90T-bg w40px"></div>
						<h2 class="size18px normal">Utilizator</h2>
						<div class="flat-line blue-90T-bg w100per"></div>
					</div>
					<div class="flex-left align-center gap-5px w300px m-left-10px">
						<div class="img18">
							<img src="images/generalElements/rightArrow.png">
						</div>
						<h2 class="size16px normal"><?php echo $_SESSION['username']; ?></h2>
					</div>
				</div>
				<div class="flex-column gap-10px">
					<div class="flex-center align-center gap-10px w300px">
						<div class="flat-line blue-90T-bg w40px"></div>
						<h2 class="size18px normal">Nume</h2>
						<div class="flat-line blue-90T-bg w100per"></div>
					</div>
					<div class="flex-left align-center gap-5px w300px m-left-10px">
						<div class="img18">
							<img src="images/generalElements/rightArrow.png">
						</div>
						<h2 class="size16px normal"><?php echo $_SESSION['lastName']; ?></h2>
					</div>
				</div>
				<div class="flex-column gap-10px">
					<div class="flex-center align-center gap-10px w300px">
						<div class="flat-line blue-90T-bg w40px"></div>
						<h2 class="size18px normal">Prenume</h2>
						<div class="flat-line blue-90T-bg w100per"></div>
					</div>
					<div class="flex-left align-center gap-5px w300px m-left-10px">
						<div class="img18">
							<img src="images/generalElements/rightArrow.png">
						</div>
						<h2 class="size16px normal"><?php echo $_SESSION['firstName']; ?></h2>
					</div>
				</div>
				<div class="flex-column gap-10px">
					<div class="flex-center align-center gap-10px w300px">
						<div class="flat-line blue-90T-bg w40px"></div>
						<h2 class="size18px normal">Email</h2>
						<div class="flat-line blue-90T-bg w100per"></div>
					</div>
					<div class="flex-left align-center gap-5px w300px m-left-10px">
						<div class="img18">
							<img src="images/generalElements/rightArrow.png">
						</div>
						<h2 class="size16px normal"><?php echo $_SESSION['email']; ?></h2>
					</div>
				</div>
			</div>
		</div>
	</section>

</body>

	<script src="javascript/links.js"></script>
	<script src="javascript/return.js"></script>
	<?php if (isset($_SESSION['admin'])): ?>
		<script src = "javascript/admin.js"></script>
	<?php endif ?>
</html>