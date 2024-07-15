<?php 
    include '../databases/databases.php';
    $manualId = 48;
    
    $sql = "SELECT * FROM manuals WHERE id = '$manualId'";
    $manual = mysqli_query($conn['main'], $sql);
    $manual = mysqli_fetch_assoc($manual);
    
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="../javascript/tailwindAddOns.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../css/customClases.css">
		<title>Printbuddy</title>
	</head>

	<body class = "flex flex-col gap-5 sm:gap-6 pb-24">
        <img src="../generalIcons/returnIcon.png" alt="" class = "h-7 w-7 mt-6 ml-3 sm:ml-6 md:mt-10 md:ml-12" onclick = "returnToLastPage()">
		<div class = "flex flex-col justify-center items-center gap-14 sm:gap-16">
			<h1 class = "font-bold text-2.5xl md:text-4xl text-primaryColor"><?php echo $manual['name'] ?></h1>
            <div class = "flex flex-col justify-center items-center gap-14 sm:gap-16 md:gap-28">
                <div class = "flex flex-col md:flex-row justify-center items-center gap-14 sm:gap-16">
                    <img src="<?php echo 'uploads/'.$manual['image']?>" alt="" class = "w-72 h-72 sm:h-80 sm:w-80 md:w-96 md:h-96 lg:w-88 lg:h-88">
                    <div class = "flex justify-center items-center gap-5">
                        <div class = "w-1 h-54 sm:h-70 rounded-xl bg-primaryColor"></div>
                        <div class = "flex flex-col gap-4 justify-center">
                            <p class = "text-1.5xl md:text-2.5xl font-bold text-primaryColor">Prezentare generală</p>
                            <p class = "text-sm sm:text-base md:text-lg text-left w-80 sm:w-105 md:w-105"><?php echo $manual['description']?></p>
                        </div>
                    </div>
                </div>
                <div class = "flex flex-col gap-7 md:gap-10 justify-center">
                    <p class = "text-1.5xl md:text-2.5xl font-bold text-primaryColor">Video pentru setup</p>
                    <iframe class = "w-84 sm:w-105 h-50 sm:h-60 md:w-180 md:h-100" src="<?php echo $manual['video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class = "flex flex-col gap-7 md:gap-8">
                    <p class = "text-1.5xl md:text-2.5xl font-bold text-primaryColor">Manual de utilizare</p>
                    <p class = "text-sm sm:text-base md:text-lg text-left w-80 sm:w-105 md:w-180">Manualul de utilizare al imprimantei 3D conține instrucțiuni esențiale pentru asamblare, configurare și optimizarea procesului de imprimare. Veți găsi, de asemenea, sfaturi pentru selectarea materialelor potrivite și soluții pentru probleme comune. Vă invităm să descărcați manualul pentru a beneficia de toate aceste informații. Poate fi descărcat <a target="_blank" class = "text-primaryColor" href="<?php echo 'uploads/'.$manual['document']?>">aici</a>.</p>
                </div>
            </div>
		</div>
    </body>
</html>

<script src = "../javascript/return.js"></script>