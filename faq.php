<?php
	include 'databases/databases.php';
	 
	$sql = "SELECT * FROM faqs";
	$faqs = mysqli_query($conn['main'], $sql);
	$faqs = mysqli_fetch_all($faqs, MYSQLI_ASSOC);

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

	<body class = "mt-12 pt-12 md:pt-32 flex flex-col items-center">
		<div class = "flex flex-col gap-8 md:gap-16 w-88 sm:w-2/3">	
			<h1 class = "font-bold text-2.5xl md:text-4xl text-primaryColor">Întrebări frecvente</h1>
			<div class = "flex flex-col gap-7">
				<?php foreach($faqs as $faq): ?>
					<div class = "flex flex-col gap-7">
						<div class = "flex justify-between items-center px-5" onclick = "toggleAnswer(this)">						
							<p class = "text-sm sm:text-base md:text-lg"><?php echo $faq['question']?></p>
							<img id="img" src="generalIcons/returnIcon.png" alt="" class = "ml-4 w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 ">
						</div>
						<p id = "answer" class = "hidden text-sm sm:text-base md:text-lg px-5"><?php echo $faq['answer']?></p>
					</div>
					<?php if(next($faqs)): ?>
						<div class = "w-full h-px bg-primaryColor"></div>	
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
		<a href = "addFAQ.php" class = "flex justify-center items-center fixed bottom-1/12 right-6 md:right-14 w-8 h-8 text-lg sm:w-10 sm:h-10 sm:text-2xl md:w-12 md:h-12 md:text-3xl font-bold text-white bg-primaryColor rounded-full shadow-md shadow-black/40">+</a>
	<!--	<a href="addManual.php">MANUAL NOU</a>
		<a href="manuals/prusa_mini.php">MANUAL 1</a> -->
		<script>
        function toggleAnswer(element) {
            const answerElement = element.nextElementSibling;
            answerElement.classList.toggle('hidden');
			element.querySelector('img').classList.toggle('animate-[rotateTo-90_0s_ease_forwards]');
        }
    </script>
    </body>

	<?php include 'includes/footer.php' ?>
</html>

