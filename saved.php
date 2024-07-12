<?php
    include 'generalFunctions/generalFunctions.php';
    include 'databases/databases.php';

    if(!checkIfConnected())
        redirectToIndex();

    if(isset($_COOKIE['refreshToken']) && !isset($_COOKIE['accessToken']))
		echo '<script src = "sessions/session.js"></script>';

	session_start();

	$username = $_SESSION['username'];

    $sql = "SELECT m.* FROM manuals m INNER JOIN saves s ON m.name = s.printerName WHERE s.username = '$username'";
	$manuals = mysqli_query($conn['main'], $sql);
	$manuals = mysqli_fetch_all($manuals, MYSQLI_ASSOC);

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
		<div class = "flex flex-col items-center gap-8 md:gap-16 w-82 sm:w-2/3 md:w-full">	
			<h1 class = "font-bold text-2xl sm:text-2.5xl md:text-4xl text-primaryColor">Salvate</h1>
			<div class = "grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16 w-80.5 sm:w-108.5 md:w-177 lg:w-273.5">
				<?php foreach($manuals as $manual): ?>
					<div id = "<?php echo "manuals/".strtolower(str_replace(' ', '_', $manual['name']))?>" class = "relative w-80.5 h-80.5 sm:w-108.5 sm:h-108.5 md:w-80.5 md:h-80.5 p-6 border border-primaryColor rounded-xl shadow-md shadow-black/15">						
						<img src="<?php echo "manuals/uploads/".$manual['image']?>" alt="" class = "w-68 h-68 sm:w-96 sm:h-96 md:w-68 md:h-68" onclick="showManual(this.parentElement)">
						<div id="<?php echo $manual['name']?>" class = "flex justify-center items-center gap-2 absolute -bottom-4 left-1/2 -translate-x-1/2 bg-white px-4">
							<p class = "text-base" onclick="showManual(this.parentElement.parentElement)"><?php echo $manual['name'] ?></p>
							<img src="generalIcons/unsaveIcon.png" alt="" class = "w-8 h-8" onclick="unSave(this.parentElement)">
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
    </body>
	
</html>

<script src="javascript/save.js"></script>
<script src ="javascript/showManual.js"></script>

