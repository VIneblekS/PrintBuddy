<?php
	include 'databases/databases.php';
	include 'generalFunctions/generalFunctions.php';

	$sql = "SELECT * FROM faqs";
	$faqs = mysqli_query($conn['main'], $sql);
	$faqs = mysqli_fetch_all($faqs, MYSQLI_ASSOC);

	$admin = 0;

	if(isset($_COOKIE['refreshToken']) && !isset($_COOKIE['accessToken']))
		echo '<script src = "sessions/session.js"></script>';

	session_start();

	if(checkIfConnected())
		$admin = $_SESSION['admin'];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="javascript/tailwindAddOns.js"></script>
		<link rel="stylesheet" href="css/customClases.css">
		<title>Printbuddy</title>
	</head>

	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<body class = "mt-12 pt-12 md:pt-28 flex flex-col items-center">
		<div class = "flex flex-col gap-8 md:gap-16 w-82 sm:w-2/3">	
			<h1 class = "font-bold text-2.5xl md:text-4xl text-primaryColor">Întrebări frecvente</h1>
			<div class = "flex flex-col gap-7">
				<?php foreach($faqs as $faq): ?>
					<div id="<?php echo $faq['id']?>" class = "flex flex-col gap-7">
						<div class = "flex flex-col gap-7">
							<div class = "relative flex justify-between items-center px-5">						
								<p class = "text-sm sm:text-base md:text-lg" onclick = "toggleAnswer(this.parentElement)"><?php echo $faq['question']?></p>
								<img src="generalIcons/returnIcon.png" alt="" class = "ml-4 w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 " onclick = "toggleAnswer(this.parentElement)">
								<?php if($admin): ?>
									<img id="<?php echo $faq['id']?>" src="generalIcons/discardIcon.png" alt="" class = "w-3 h-3 absolute left-0 sm:left-full sm:ml-5" onclick="togglePopUp(this.id)">
								<?php endif ?>
							</div>
							<p id = "answer" class = "hidden text-sm sm:text-base md:text-lg px-5"><?php echo $faq['answer']?></p>
						</div>
						<?php if(next($faqs)): ?>
							<div class = "w-full h-px bg-primaryColor"></div>	
						<?php endif ?>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div id = "popUp" class = "fixed top-0 left-0 w-full h-full backdrop-blur-sm bg-primaryColor bg-opacity-10 flex justify-center items-center hidden">
			<div class = "w-82 sm:w-105 sm:h-44 h-40 md:w-135 shadow-xl shadow-black/15 absolute bg-white flex justify-center items-center rounded-2xl">
				<div class = "flex flex-col items-center gap-3 md:gap-6 w-72 sm:w-96 md:w-120">	
					<h1 class = "text-sm md:text-base lg:text-lg">Ești sigur că dorești să ștergi acestă întrebare definitiv?</h1>
					<div class = "flex gap-4">
						<button id="deleteButton" class = "w-28 h-8 md:w-30 md:h-9 items-center flex justify-center text-xs md:text-sm text-white bg-red-700 rounded-lg font-normal shadow-md shadow-black/20" onclick = "deleteFAQ(this)">Șterge</button>
						<button class = "w-28 h-8 md:w-30 md:h-9 items-center flex justify-center text-xs md:text-sm text-red-700 border border-red-700 rounded-lg font-normal shadow-md shadow-black/20" onclick="togglePopUp(this.id)">Anulează</button>
					</div>
				</div>
			</div>
		</div>
		<?php if($admin): ?>
			<a href = "addFAQ.php" class = "flex justify-center items-center fixed bottom-1/12 right-6 md:right-14 w-8 h-8 text-lg sm:w-10 sm:h-10 sm:text-2xl md:w-12 md:h-12 md:text-3xl font-bold text-white bg-primaryColor rounded-full shadow-md shadow-black/40">+</a>
		<?php endif ?>	
	</body>

	<?php include 'includes/footer.php' ?>
</html>

<script src = "javascript/deleteFAQ.js"></script>
<script src = "javascript/showAnswer.js"></script>

