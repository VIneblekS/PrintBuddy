<?php
    include 'generalFunctions/generalFunctions.php';
    include 'databases/databases.php';

    if(!checkIfConnected())
        redirectToIndex();

    if(isset($_COOKIE['refreshToken']) && !isset($_COOKIE['accessToken']))
		echo '<script src = "sessions/session.js"></script>';
	else {
		session_start();

		$username = $_SESSION['username'];

		$sql = "SELECT m.* FROM manuals m INNER JOIN saves s ON m.name = s.printerName WHERE s.username = '$username'";
		$manuals = mysqli_query($conn['main'], $sql);
		$manuals = mysqli_fetch_all($manuals, MYSQLI_ASSOC);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="javascript/tailwindAddOns.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/customClases.css">
		<title>Printbuddy</title>
	</head>

	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<body class = "mt-12 pt-12 md:pt-16 pb-28 flex flex-col items-center">
		<div class = "flex flex-col items-center justify-center gap-8 md:gap-16 w-82 sm:w-2/3 md:w-full">	
			<h1 class = "font-bold text-2xl sm:text-2.5xl md:text-4xl text-primaryColor">Salvate</h1>
			<?php if($manuals):?>
				<div class = "grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16 w-80.5 sm:w-108.5 md:w-177 lg:w-273.5">
					<?php foreach($manuals as $manual): ?>
						<div id = "<?php echo "manuals/".strtolower(str_replace(' ', '_', $manual['name']))?>" class = "relative w-80.5 h-80.5 sm:w-108.5 sm:h-108.5 md:w-80.5 md:h-80.5 p-6 border border-primaryColor rounded-xl shadow-md shadow-black/15">						
							<img src="<?php echo "manuals/uploads/".$manual['image']?>" alt="" class = "w-68 h-68 sm:w-96 sm:h-96 md:w-68 md:h-68" onclick="showManual(this.parentElement)">
							<div id="<?php echo $manual['name']?>" class = "flex justify-center items-center gap-2 absolute -bottom-4 left-1/2 -translate-x-1/2 bg-white">
								<p class = "pl-4 bg-white <?php if(!checkIfConnected()) echo "pr-4" ?> text-base whitespace-nowrap" onclick="showManual(this.parentElement.parentElement)"><?php echo $manual['name'] ?></p>
								<img src="generalIcons/unsaveIcon.png" alt="" class = "w-12 h-8 pr-4 bg-white" onclick="unSave(this.parentElement)">
							</div>
						</div>
					<?php endforeach ?>
				</div>
			<?php else: ?>
				<div class = "flex flex-col md:flex-row gap-8 items-center justify-center">
					<img src="images&videoes/emptySavedImage.png" alt="" class = "w-44 h-44 sm:w-54 sm:h-54 md:w-72 md:h-72">
					<p class = "text-xs sm:text-sm w-82 sm:w-105 md:text-base md:text-left text-center">Nimic de văzut aici momentan! Ai posibilitatea de a explora o multitudine de manuale pentru cele mai cunoscute imprimante 3D. Îți poți începe călătoria <a class = "text-primaryColor" href="availableManuals.php">aici</a>, iar când salvezi un manual acesta va apărea aici.</p>
				</div>
			<?php endif ?>
		</div>
    </body>
	
</html>

<script src="javascript/save.js"></script>
<script src ="javascript/show.js"></script>

